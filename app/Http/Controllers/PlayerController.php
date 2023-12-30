<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Scouts_team;
use App\Models\VideoPosts;
use Carbon\Carbon;
use App\Http\Requests\VideoPostRequest;
use Illuminate\Support\Facades\Auth;


class PlayerController extends Controller
{

    // 選手が希望チーム宛に動画を投稿する
    public function store (VideoPostRequest $request) 
    {
        $validated = $request->validated();
        
        $videoPost = new VideoPosts;
        $videoPost->players_id = Auth::id();
        $videoPost->scouts_team_id = $validated['team_id'];
        $videoPost->post_date = $validated['day'];
        $videoPost->post_url_1 = $validated['url1'];
        $videoPost->check_point_1 = $validated['point1'];
        $videoPost->post_url_2 = $validated['url2'];
        $videoPost->check_point_2 = $validated['point2'];
        $videoPost->post_url_3 = $validated['url3'];
        $videoPost->check_point_3 = $validated['point3'];

        $videoPost->save();
        return redirect('/completion-success');
    }

    // 投稿先のチームを取
    public function player_video_post () 
    {
        $scouts_team = Scouts_team::all();
        return view('player_video_post', compact('scouts_team'));
    }

    // URL投稿履歴画面に関する処理
    public function player_video_history ()
    {
        $userIds = Auth::id(); // ログインしているユーザーのIDを取得
        $videoPosts = VideoPosts::with('scoutsTeam')->where('players_id', $userIds)->get();
        return view('player_video_history', compact('videoPosts'));
    }

    // ユーザー(player)情報を取得し、viewに返却
    public function player_register_info() 
    {
        $player = Auth::user(); // 現在ログインしているユーザーを取得
        return view('player_info', compact('player')); // ビューにデータを渡す
    }

    public function success () 
    {
        return view('completion_success');
    }

}
