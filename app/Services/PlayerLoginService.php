<?php

namespace App\Services;

use App\Consts\CommonConsts;
use stdClass;
use Exception;


class PlayerLoginService extends BaseService
{
  /**
   * ログイン認証及びトークン取得
   * @param string $email
   * @param string $password
   * @return $token
   * @throws Exception
   */
  public function auth(string $email, string $password): string
  {
    $param = new stdClass;
    $param->email = $email;
    $param->password = $password;

    $response = $this->talentArenaApi('login/auth', 'get', (array)$param);
    if ($response['body']['result_code'] != 200) {
      throw new Exception($response['body']['result_message']);
    }

    $token = $response['body']['token'];

    return $token;
  }
}
