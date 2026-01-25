<?php

namespace App\Services;

use App\Consts\CommonConsts;
use stdClass;
use Exception;


class PlayerLoginService extends BaseService
{
  /**
   * 選手
   * param string $email
   * param string $password
   * return void
   * @throws Exception
   */
  public function postPlayerLogin(string $email, string $password): void
  {
    $param = new stdClass;
    $param->email = $email;
    $param->password = $password;
    $param->status = CommonConsts::IS_TMP_MEMBER;

    $response = $this->talentArenaApi('login/restore', 'get', (array)$param);
    if ($response['status'] != 200) {
      throw new Exception($response['body']['result_message']);
    }
  }
}
