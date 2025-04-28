<?php

namespace App\Services;

use App\Consts\CommonConsts;

use stdClass;
use Illuminate\Http\Exceptions\HttpResponseException;

use Exception;
use Throwable;





class PlayerService extends BaseService
{
  public function postEmailAuth(string $email): void
  {
    $param = new stdClass;
    $param->email = $email;
    $param->player_status = CommonConsts::PLAYER_STATUS_REGISTER;

    if (session()->has('player.player_status') && session()->has('player.email')) {
      $param->player_status = session()->get('player.player_status');
      $param->email = session()->get('player.email');
    }
    // $response = $this->talentArenaApi('register/create_email', 'get', (array) $param);
    $response = $this->talentArenaApi('register/create_email', 'get', (array) $param);

    if (!isset($response['status']) || $response['status'] != 200) {
      $errorMessage = $response['body']['result_message'] ?? 'APIエラーが発生しました。';
      throw new Exception($errorMessage);
    }

    $tmp_auth = $response['body'] ?? [];

    $this->sendEmail(
      "Talent_Arena｜会員仮登録のお知らせ",
      'player_auth',
      $email,
      ['url' => $this->_makeAuthEmailUrl($tmp_auth['auth_key'])]
    );

    session()->flash('email', $email);
    session()->flash('member_id', $tmp_auth['member_id']);
  }

  private function _makeAuthEmailUrl(string $auth_key): string
  {
    return route('player.get.auth', $auth_key);
  }
}
