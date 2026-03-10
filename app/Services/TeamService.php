<?php

namespace App\Services;

use App\Consts\CommonConsts;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Http;
use stdClass;
use Exception;
use Throwable;
use Illuminate\Support\Facades\Log;

class TeamService extends BaseService
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
    $param->status = CommonConsts::IS_TMP_TEAM;
    $param->subject_type = CommonConsts::SUBJECT_TYPE_TEAMS;

    $response = $this->talentArenaApi('register/create_email', 'get', (array)$param);
    if ($response['status'] != 200) {
      throw new Exception($response['body']['result_message']);
    }

    $tmp_auth = $response['body'];

    $this->sendEmail(
      "Talent_Arena｜会員仮登録のお知らせ",
      'email_auth_send_team',
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
    return route('team.get.auth', ['key' => $auth_key]);
  }

  /**
   * 選手登録情報取得
   * param string $auth_key
   * return void
   */
  public function getAuth(string $auth_key): array
  {
    $response = $this->talentArenaApi('register/team', 'get', [
      'auth_key' => $auth_key
    ]);

    if ($response['status'] != 200 || empty($response['body']) || $response['body']['result_message'] != 'OK') {
      throw new Exception('新規登録処理中のプレイヤー情報を取得できませんでした。');
    }

    if ($response['body']['team']['teams_status'] != CommonConsts::IS_TMP_TEAM) {
      throw new Exception('既に利用中のプレイヤーです。');
    }
    $team = $response['body']['team'];

    $result = [
      'title' => 'チーム登録 | Talent Arena',
      'email' => $team['email'],
      'auth_key' => $auth_key,
      'subject_id' => $team['subject_id'],
      'subject_type' => CommonConsts::SUBJECT_TYPE_TEAMS
    ];
    return $result;
  }

  public function postJoin(array $data): array
  {
    $response = $this->talentArenaApi('register/team_join', 'post', $data);
    if ($response['status'] != 200 || empty($response['body']) || $response['body']['result_message'] != 'OK') {
      throw new Exception('新規登録処理に失敗しました。');
    }

    $result = [
      'title' => 'ユーザー登録確認 | Talent Arena',
    ];

    return $result;
  }

  /**
   * チーム情報取得
   * return array
   * @throws Exception
   */
  public function getTeamProfile(): array
  {
    $response = $this->talentArenaApi('team/profile', 'get');

    if ($response['status'] != 200 || empty($response['body']) || $response['body']['result_message'] != 'OK') {
      throw new Exception('チーム情報を取得できませんでした。');
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
   * チーム情報更新処理
   * param array $array 
   * return bool
   * @throws Exception
   */
  public function postTeamProfileUpdate(array $data): bool
  {
    $response = $this->talentArenaApi('team/update', 'post', [
      'data' => $data,
    ]);

    if ($response['status'] != 200 || empty($response['body']) || $response['body']['result_message'] != 'OK') {
      throw new Exception('選手情報を取得できませんでした。');
    }

    $is_update = $response['body']['update'];

    return $is_update;
  }
}
