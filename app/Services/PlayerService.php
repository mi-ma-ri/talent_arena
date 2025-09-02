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
    $param->user_status = CommonConsts::PLAYER_STATUS_REGISTER;
    $param->user_type = CommonConsts::USER_TYPE_PLAYERS;

    if (session()->has('player.user_status') && session()->has('player.email')) {
      $param->email = session()->get('player.email');
      $param->user_status = session()->get('player.user_status');
      $param->user_type = session()->get('player.user_type');
    }

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
      'title' => '新規会員登録のお手続き(選手) | Talent Arena',
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
  public function getRegister(string $auth_key): array
  {
    $response = $this->talentArenaApi('register/register_info', 'get', [
      'key' => $auth_key,
      'table' => 'auth_keys'
    ]);
    if ($response['status'] != 200 || empty($response['body']) || $response['body']['result_message'] != 'OK') {
      throw new Exception('無効な認証キーです。');
    }

    $auth_info = $response['body']['auth_info'];

    $result = [
      'title' => 'ユーザー登録 | Talent Arena',
      'auth_info' => $auth_info
    ];

    return $result;
  }
}
