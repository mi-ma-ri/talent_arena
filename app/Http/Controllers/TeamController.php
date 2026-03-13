<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeamPostEmailAuthRequest;
use App\Http\Requests\TeamGetAuthRequest;
use App\Http\Requests\TeamPostConfirmRequest;
use App\Http\Requests\TeamPostProfileUpdateRequest;

use App\Services\TeamService;
use App\Consts\CommonConsts;
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
   * チーム情報登録確認画面
   */
  public function postConfirm(TeamPostConfirmRequest $request)
  {
    return view(
      'team.confirm',
      [
        'auth_key' => $request->auth_key,
        'subject_id' => $request->subject_id,
        'email' => $request->email,
        'password' => $request->password,
        'title' => '登録情報確認',
        'teams_name' => $request->teams_name,
        'location' => $request->location,
        'website' => $request->website,
        'teams_policy' => $request->teams_policy,
        'schedule' => $request->schedule,
        'ob_affiliation' => $request->ob_affiliation,
        'subject_type' => $request->subject_type
      ]
    );
  }

  /**
   * チーム情報登録処理
   */
  public function postJoin(Request $request, TeamService $team_service)
  {
    try {
      session(['subject_type' => CommonConsts::SUBJECT_TYPE_TEAMS]);
      return view('complete', $team_service->postJoin($request->all()));
    } catch (Throwable $e) {
      Log::error($e->getMessage());
      return redirect()->route('team.get.auth');
    }
  }

  /**
   * チーム情報登録処理
   */
  public function getTeamInfo()
  {
    return view('team.info');
  }

  /**
   * チームプロフィール画面
   */
  public function getTeamProfile(Request $request, TeamService $team_service)
  {
    $profile = $team_service->getTeamProfile();

    return view(
      'team.profile',
      [
        'address' => $profile['address'],
        'teams_name' => $profile['teams_name'],
        'website' => $profile['website'],
        'location' => $profile['location'],
        'teams_policy' => $profile['teams_policy'],
        'schedule' => $profile['schedule'],
        'ob_affiliation' => $profile['ob_affiliation'],
      ]
    );
  }

  /**
   * チーム情報編集画面
   */
  public function getTeamProfileEdit(Request $request, TeamService $team_service)
  {
    $profile = $team_service->getTeamProfile();

    return view(
      'team.profile_edit',
      [
        'address' => $profile['address'],
        'teams_name' => $profile['teams_name'],
        'website' => $profile['website'],
        'location' => $profile['location'],
        'teams_policy' => $profile['teams_policy'],
        'schedule' => $profile['schedule'],
        'ob_affiliation' => $profile['ob_affiliation'],
      ]
    );
  }

  /**
   * チーム情報更新処理
   */
  public function postTeamProfileUpdate(TeamPostProfileUpdateRequest $request, TeamService $team_service)
  {
    $is_update = $team_service->postTeamProfileUpdate([
      'address' => $request->address,
      'website' => $request->website,
      'location' => $request->location,
      'teams_policy' => $request->teams_policy,
      'schedule' => $request->schedule,
      'ob_affiliation' => $request->ob_affiliation,
    ]);

    if (!$is_update) {
      return redirect()->route('team.get.profile')->with('error', '更新に失敗しました。');
    }

    return redirect()->route('team.get.profile')->with('success', '更新が完了しました！');
  }

  /**
   * 選手投稿URL一覧取得
   */
  public function getPlayerVideos(Request $request, TeamService $team_service)
  {
    return view(
      'team.players_list',
      $team_service->getPlayerVideos()
    );
  }
}
