<?php

namespace App\Services;

use App\Consts\CommonConsts;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Http;
use stdClass;
use Exception;
use Throwable;
use Illuminate\Support\Facades\Log;

class PlayerService extends BaseService
{
  /**
   * 仮登録メール送信処理
   * param string $email
   * return void
   * @throws Exception
   */
  public function postEmailAuth(string $email): void
  {
    $param = new stdClass;
    $param->email = $email;
    # 仮登録ステータス
    $param->status = CommonConsts::IS_TMP_MEMBER;
    # ユーザータイプ(選手)
    $param->subject_type = CommonConsts::SUBJECT_TYPE_PLAYERS;

    $response = $this->talentArenaApi('register/create_email', 'get', (array)$param);
    if ($response['status'] != 200) {
      throw new Exception($response['body']['result_message']);
    }

    $tmp_auth = $response['body'];

    $this->sendEmail(
      "Talent_Arena｜会員仮登録のお知らせ",
      'email_auth_send',
      $email,
      ['url' => $this->_makeAuthEmailUrl($tmp_auth['key'])]
    );

    session()->flash('email', $email);
  }

  public function getEmailAuthSend(): array
  {
    $result = [
      'title' => 'メール送信完了',
      'email' => session('email'),
    ];

    return $result;
  }

  private function _makeAuthEmailUrl(string $auth_key): string
  {
    return route('player.get.auth', ['key' => $auth_key]);
  }

  /**
   * 選手登録情報取得
   * param string $auth_key
   * return void
   */
  public function getAuth(string $auth_key): array
  {
    $response = $this->talentArenaApi('register/get_register_player', 'get', [
      'auth_key' => $auth_key
    ]);

    if ($response['status'] != 200 || empty($response['body']) || $response['body']['result_message'] != 'OK') {
      throw new Exception('新規登録処理中のプレイヤー情報を取得できませんでした。');
    }

    if ($response['body']['player']['players_status'] != CommonConsts::IS_TMP_MEMBER) {
      throw new Exception('既に利用中のプレイヤーです。');
    }
    $player = $response['body']['player'];

    $result = [
      'title' => 'ユーザー登録 | Talent Arena',
      'email' => $player['email'],
      'auth_key' => $auth_key,
      'subject_id' => $player['subject_id']
    ];

    return $result;
  }

  public function postJoin(array $data): array
  {
    $response = $this->talentArenaApi('register/join', 'post', $data);
    if ($response['status'] != 200 || empty($response['body']) || $response['body']['result_message'] != 'OK') {
      throw new Exception('新規登録処理に失敗しました。');
    }

    $result = [
      'title' => 'ユーザー登録確認 | Talent Arena',
    ];

    return $result;
  }

  /**
   * 選手情報取得
   * param string $token
   * return array
   * @throws Exception
   */
  public function getProfile(string $token): array
  {
    $response = $this->talentArenaApi('player/profile', 'get', [
      'token' => $token
    ]);

    if ($response['status'] != 200 || empty($response['body']) || $response['body']['result_message'] != 'OK') {
      throw new Exception('選手情報を取得できませんでした。');
    }

    $profile = $response['body']['profile'];

    return $profile;
  }

  /**
   * 選手情報更新画面
   * param string $token
   * return array
   * @throws Exception
   */
  public function getProfileEdit(string $token): array
  {
    $response = $this->talentArenaApi('player/profile', 'get', [
      'token' => $token
    ]);

    if ($response['status'] != 200 || empty($response['body']) || $response['body']['result_message'] != 'OK') {
      throw new Exception('選手情報を取得できませんでした。');
    }

    $profile = $response['body']['profile'];

    return $profile;
  }

  /**
   * 選手情報更新処理
   * param string $token
   * param string $array 
   * return array
   * @throws Exception
   */
  public function getProfileUpdate(string $token, string $address, string $position): bool
  {
    $response = $this->talentArenaApi('player/update', 'post', [
      'token' => $token,
      'address' => $address,
      'position' => $position
    ]);

    if ($response['status'] != 200 || empty($response['body']) || $response['body']['result_message'] != 'OK') {
      throw new Exception('選手情報を取得できませんでした。');
    }

    $is_update = $response['body']['update'];

    return $is_update;
  }

  /**
   * 動画URL投稿
   * param array $param
   * return bool
   * @throws Exception
   */
  public function postHandleUrl(array $data): bool
  {
    $postData = [
      'url1' => $data['url1'],
      'url2' => $data['url2'] ?? null,
      'url3' => $data['url3'] ?? null,
      'description' => $data['description'],
    ];
    $response = $this->talentArenaApi('player/handle', 'post', [
      'postData' => $postData,
    ]);

    if ($response['status'] != 200 || empty($response['body']) || $response['body']['result_message'] != 'OK') {
      throw new Exception('選手情報を取得できませんでした。');
    }

    $is_handle = $response['body']['insert'];

    return $is_handle;
  }


  /**
   * 動画URL一覧取得
   * return array
   * @throws Exception
   */
  public function getVideoUrl(): array
  {
    $response = $this->talentArenaApi('player/url', 'get');

    $video_data = $response['body']['video_data'];

    return $video_data;
  }
}
