<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerPostProfileUpdateRequest;
use App\Http\Requests\PlayerPostEmailAuthRequest;
use App\Http\Requests\PlayerGetAuthRequest;
use App\Http\Requests\PlayerPostConfirmRequest;
use App\Http\Requests\PlayerPostUrlRequest;
use App\Services\PlayerService;
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

    /**
     * 選手マイページトップ
     */
    public function getInfo(Request $request, PlayerService $player_service)
    {
        # 動画投稿データ取得
        $video_data = $player_service->getVideoUrl();

        return view('player.info', ['video_data' => $video_data]);
    }

    /**
     * 選手プロフィール画面
     */
    public function getProfile(Request $request, PlayerService $player_service)
    {
        $token = session('token');
        $profile = $player_service->getProfile($token);

        return view(
            'player.profile',
            [
                'address' => $profile['address'],
                'first_name' => $profile['first_name'],
                'second_name' => $profile['second_name'],
                'affiliated_team' => $profile['affiliated_team'],
                'position' => $profile['position'],
                'birth_date' => $profile['birth_date'],
            ]
        );
    }

    /**
     * 選手編集画面
     */
    public function getProfileEdit(Request $request, PlayerService $player_service)
    {

        $token = session('token');
        $profile = $player_service->getProfile($token);
        return view(
            'player.profile_edit',
            [
                'address' => $profile['address'],
                'first_name' => $profile['first_name'],
                'second_name' => $profile['second_name'],
                'affiliated_team' => $profile['affiliated_team'],
                'position' => $profile['position'],
                'birth_date' => $profile['birth_date'],
            ]
        );
    }

    /**
     * 選手情報更新処理
     */
    public function postProfileUpdate(PlayerPostProfileUpdateRequest $request, PlayerService $player_service)
    {
        $token = session('token');
        $is_update = $player_service->getProfileUpdate($token, $request->address, $request->position);

        if (!$is_update) {
            return redirect()->route('player.get.profile')->with('error', '更新に失敗しました。');
        }

        return redirect()->route('player.get.profile')->with('success', '登録が完了しました！');
    }

    /**
     * 動画URL投稿画面
     */
    public function postUrl()
    {
        return view('player.post_url');
    }

    /**
     * 動画URL投稿処理
     */
    public function postHandleUrl(PlayerPostUrlRequest $request, PlayerService $player_service)
    {
        $insert = $player_service->postHandleUrl($request->all());

        if (!$insert) {
            return redirect()->route('player.get.info')->with('error', 'URL投稿に失敗しました。');
        }

        return redirect()->route('player.get.info')->with('success', 'URL投稿に成功しました！');
    }
}
