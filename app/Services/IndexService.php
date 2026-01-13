<?php

namespace App\Services;

use App\Consts\CommonConsts;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Http;
use stdClass;
use Exception;
use Throwable;
use Illuminate\Support\Facades\Log;



class IndexService extends BaseService
{
  // public function getInitialAccess(): void
  // {
  //   try {
  //     $response = $this->talentArenaApi('register/init', 'get', []);
  //     Log::info('API response', $response);
  //   } catch (\Throwable $e) {
  //     Log::error('初回通信失敗: ' . $e->getMessage());
  //   }
  // }

  // public function postEmailAuth(string $email): void
  // {
  //   $param = new stdClass;
  //   $param->email = $email;
  //   $param->user_status = CommonConsts::PLAYER_STATUS_REGISTER;
  //   $param->user_type = CommonConsts::USER_TYPE_PLAYERS;

  //   if (session()->has('player.user_status') && session()->has('player.email')) {
  //     $param->email = session()->get('player.email');
  //     $param->user_status = session()->get('player.user_status');
  //     $param->user_type = session()->get('player.user_type');
  //   }
  //   dd(session()->all());

  //   $response = $this->talentArenaApi('register/create_email', 'get', (array)$param);
  //   dd($response);

  //   if ($response['status'] != 200) {
  //     $message = $response['body']['result_message'] ?? '不明なエラーが発生しました';
  //     throw new Exception($message);
  //   }

  //   $tmp_auth = $response['body'] ?? [];

  //   $this->sendEmail(
  //     "Talent_Arena｜会員仮登録のお知らせ",
  //     'player_auth',
  //     $email,
  //     ['url' => $this->_makeAuthEmailUrl($tmp_auth['auth_key'])]
  //   );

  //   session()->flash('email', $email);
  //   session()->flash('member_id', $tmp_auth['member_id']);
  // }

  // private function _makeAuthEmailUrl(string $auth_key): string
  // {
  //   return route('player.get.auth', $auth_key);
  // }
}
