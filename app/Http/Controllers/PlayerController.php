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

    public function postJoin(Request $request, PlayerService $player_service)
    {
        try {
            return view('register_success', $player_service->postJoin($request->all()));
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->route('player.get.auth');
        }
    }








    // // 選手が希望チーム宛に動画を投稿する
    // public function store(VideoPostRequest $request)
    // {
    //     $validated = $request->validated();

    //     $videoPost = new VideoPosts;
    //     $videoPost->players_id = Auth::id(); // 認証済みのユーザーidを取得
    //     $videoPost->scouts_team_id = $validated['team_id'];
    //     $videoPost->post_date = $validated['day'];
    //     $videoPost->post_url_1 = $validated['url1'];
    //     $videoPost->check_point_1 = $validated['point1'];
    //     $videoPost->post_url_2 = $validated['url2'];
    //     $videoPost->check_point_2 = $validated['point2'];
    //     $videoPost->post_url_3 = $validated['url3'];
    //     $videoPost->check_point_3 = $validated['point3'];

    //     $videoPost->save();
    //     return redirect('/completion-success');
    // }

    // /*
    //     プレイヤーがURLを投稿する「投稿先のチーム」を取得
    //     player_video_postへ値を渡している
    // */
    // public function player_video_post()
    // {
    //     // チーム名だけ取得
    //     $scouts_team = ScoutsTeam::select('team_name', 'id')->get();
    //     return view('player_video_post', compact('scouts_team'));
    // }

    // /*
    //     プレイヤー自身が投稿した履歴を取得
    //     YouTubeのタイトル・サムネイルをYoutubeClient.phpから取得している。
    // */
    // public function player_video_history()
    // {
    //     $userIds = Auth::id(); // ログインしているユーザーのIDを取得
    //     $videoPosts = VideoPosts::with('scoutsTeam')->where('players_id', $userIds)->paginate(3);

    //     $youtubeClient = new YoutubeClient();

    //     foreach ($videoPosts as $videoPost) {
    //         // youtubeサムネイル化
    //         $videoPost->thumbnail_url_1 = $youtubeClient->getYouTubeThumbnailUrl($videoPost->post_url_1);
    //         $videoPost->thumbnail_url_2 = $youtubeClient->getYouTubeThumbnailUrl($videoPost->post_url_2);
    //         $videoPost->thumbnail_url_3 = $youtubeClient->getYouTubeThumbnailUrl($videoPost->post_url_3);

    //         // youtubeのタイトル表示
    //         $videoPost->title_1 = $youtubeClient->getYouTubeVideoTitle($videoPost->post_url_1);
    //         $videoPost->title_2 = $youtubeClient->getYouTubeVideoTitle($videoPost->post_url_2);
    //         $videoPost->title_3 = $youtubeClient->getYouTubeVideoTitle($videoPost->post_url_3);
    //     }

    //     return view('player_video_history', compact('videoPosts'));
    // }

    // /*
    //    ユーザー(player)情報を取得し、viewに返却
    // */
    // public function player_register_info()
    // {
    //     $player = Auth::guard('web')->user(); // 現在ログインしているユーザーを取得
    //     return view('player_info', compact('player')); // ビューにデータを渡す
    // }

    // public function playerEdit()
    // {
    //     $player = Auth::guard('web')->user(); // 現在ログインしているユーザーを取得
    //     return view('player_edit', compact('player'));
    // }

    // public function playerUpdate(UserUpdateRequest $request, $id)
    // {

    //     $validated = $request->validated();

    //     $player = Auth::guard('web')->user(); // 現在ログインしているユーザーを取得
    //     $player->email = $validated['email'];
    //     $player->full_name = $validated['full_name'];
    //     $player->birthday = $validated['birthday'];
    //     $player->current_team = $validated['team_name'];
    //     $player->position = $validated['position'];

    //     $player->save();
    //     return view('completion_update');
    // }

    // /*
    //    選手が各チーム情報の閲覧ができる
    // */
    // public function player_teamNotice()
    // {
    //     $teamDetails = ScoutsTeam::with('teamDetail')->paginate(2);
    //     return view('player_teamNotice', compact('teamDetails'));
    // }


    // public function success()
    // {
    //     return view('completion_success');
    // }

    // public function updateSuccess()
    // {
    //     return view('completion_update');
    // }
}
