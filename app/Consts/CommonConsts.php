<?php

namespace App\Consts;

class CommonConsts
{

  /*
    |--------------------------------------------------------------------------
    | user_status(選手側のステータス)
    |--------------------------------------------------------------------------
  */
  public const PLAYER_STATUS_REGISTER = 0; // 仮登録
  public const PLAYER_STATUS_USE = 1; // 登録済み
  public const STATUS_MATCHING_LEAVED = 2; // マッチング退会
  public const STATUS_NORMAL_LEAVED   = 3; // 通常退会

  /*
    |--------------------------------------------------------------------------
    | user_type(認証ロール)
    |--------------------------------------------------------------------------
  */
  public const USER_TYPE_PLAYERS = 0; // 選手
  public const USER_TYPE_TEAMS = 1; // スカウトチーム
}
