<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeamPostEmailAuthRequest;
use App\Http\Requests\TeamGetAuthRequest;
use App\Http\Requests\TeamPostConfirmRequest;

use App\Services\TeamService;
use Throwable;
use Illuminate\Support\Facades\Log;





class TeamController extends Controller
{
  public function getTemporary()
  {
    return view('team.temporary', [
      'title' => 'アカウント新規作成'
    ]);
  }

  /**
   * 仮登録メール送信処理
   */
  public function postEmailAuth(TeamPostEmailAuthRequest $request, TeamService $team_service)
  {
    try {
      $team_service->postEmailAuth($request->email);
      return redirect()->route('team.get.email_auth_send');
    } catch (Throwable $e) {
      Log::error($e->getMessage());
      return redirect()->route('team.get.email_duplicate');
    }
  }

  /**
   * 仮登録メール送信完了画面
   */
  public function getEmailAuthSend(TeamService $team_service)
  {
    return view('team.register_auth_send', $team_service->getEmailAuthSend());
  }

  /**
   * 仮登録メール送信失敗画面
   */
  public function getEmailDuplicate()
  {
    return view('team.register_duplicate');
  }

  /**
   * チーム情報登録画面
   */
  public function getAuth(TeamGetAuthRequest $request, TeamService $team_service)
  {
    try {
      return view(
        'team.auth',
        $team_service->getAuth($request->key)
      );
    } catch (Throwable $e) {
      Log::error($e->getMessage());
      return redirect()->route('team.get.temporary');
    }
  }

  /**
   * 選手情報登録確認画面
   */
  public function postConfirm(TeamPostConfirmRequest $request)
  {
    return view(
      'team.confirm',
      [
        'auth_key' => $request->auth_key,
        'subject_id' => $request->subject_id,
        'email' => $request->email,
        'title' => '登録情報確認',
        'teams_name' => $request->teams_name,
        'location' => $request->location,
        'website' => $request->website,
        'teams_policy' => $request->teams_policy,
        'schedule' => $request->schedule,
        'ob_affiliation' => $request->ob_affiliation
      ]
    );
  }

  /**
   * 選手情報登録処理
   */
  public function postJoin(Request $request, TeamService $team_service)
  {
    try {
      return view('complete', $team_service->postJoin($request->all()));
    } catch (Throwable $e) {
      Log::error($e->getMessage());
      return redirect()->route('player.get.auth');
    }
  }
}
