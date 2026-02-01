<?php

namespace App\Http\Controllers;

use App\Consts\CommonConsts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\YoutubeClient;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\PlayerPostEmailAuthRequest;
use App\Http\Requests\PlayerGetAuthRequest;
use App\Http\Requests\PlayerPostConfirmRequest;
use App\Models\ScoutsTeam;
use App\Models\VideoPosts;
use App\Models\TeamDetails;
use App\Http\Requests\VideoPostRequest;
use App\Services\PlayerService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;
use Exception;


class PlayerController extends Controller
{

    /**
     * 仮登録メール送信画面
     */
    public function getTemporary()
    {
        return view('player.temporary', [
            'title' => 'アカウント新規作成'
        ]);
    }

    /**
     * 仮登録メール送信処理
     */
    public function postEmailAuth(PlayerPostEmailAuthRequest $request, PlayerService $player_service)
    {
        try {
            $player_service->postEmailAuth($request->email);
            return redirect()->route('player.get.email_auth_send');
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->route('player.get.email_duplicate');
        }
    }

    /**
     * 仮登録メール送信完了画面
     */
    public function getEmailAuthSend(PlayerService $player_service)
    {
        return view('player.register_auth_send', $player_service->getEmailAuthSend());
    }
    /**
     * 仮登録メール送信失敗画面
     */
    public function getEmailDuplicate()
    {
        return view('player.register_duplicate');
    }

    /**
     * 選手情報登録画面
     */
    public function getAuth(PlayerGetAuthRequest $request, PlayerService $player_service)
    {
        try {
            return view(
                'player.auth',
                $player_service->getAuth($request->key)
            );
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->route('player.get.temporary');
        }
    }
    /**
     * 選手情報登録確認画面
     */
    public function postConfirm(PlayerPostConfirmRequest $request)
    {
        return view(
            'player.confirm',
            [
                'auth_key' => $request->auth_key,
                'title' => 'プレイヤー(選手)登録確認',
                'password' => $request->password,
                'birth_year' => $request->birth_year,
                'birth_month' => $request->birth_month,
                'birth_day' => $request->birth_day,
                'first_name' => $request->first_name,
                'second_name' => $request->second_name,
                'affiliated_team' => $request->affiliated_team,
                'position' => $request->position,
                'subject_id' => $request->subject_id,
            ]
        );
    }
    /**
     * 選手情報登録処理
     */
    public function postJoin(Request $request, PlayerService $player_service)
    {
        try {
            return view('complete', $player_service->postJoin($request->all()));
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->route('player.get.auth');
        }
    }
}
