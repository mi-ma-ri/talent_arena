<?php

namespace App\Services;

use App\Consts\CommonConsts;
use stdClass;
use Exception;


class PlayerLoginService extends BaseService
{
  /**
   * 選手ログイン認証
   * @param string $email
   * @param string $password
   * @return void
   * @throws Exception
   */
  public function authenticate(string $email, string $password): void
  {
    $param = new stdClass;
    $param->email = $email;
    $param->password = $password;

    $response = $this->talentArenaApi('login/restore', 'get', (array)$param);
    dd($response);
    if ($response['body']['result_code'] != 200) {
      throw new Exception($response['body']['result_message']);
    }
  }
}
