<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Scouts_team;
use App\Models\Video_posts;
use Carbon\Carbon;



class PlayerController extends Controller
{

    // 選手が希望チーム宛に動画を投稿する
    public function store (Request $request) 
    {
        $videoPost = new Video_posts;
        $videoPost->players_id = $request->input('player_id');
        $videoPost->scouts_team_id = $request->input('team_id');
        $videoPost->post_date = $request->input('day');
        $videoPost->post_url_1 = $request->input('url1');
        $videoPost->check_point_1 = $request->input('point1');
        $videoPost->post_url_2 = $request->input('url2');
        $videoPost->check_point_2 = $request->input('point2');
        $videoPost->post_url_3 = $request->input('url3');
        $videoPost->check_point_3 = $request->input('point3');

        $videoPost->save();
        return redirect('/completion-register');
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
        $videoPost = Video_posts::with('scoutsTeam')->get();
        return view('player_video_history', compact('videoPost'));
    }

    // ユーザー(player)情報を取得し、viewに返却
    public function player_register_info() 
    {
        $players = Player::all(); // すべてのユーザーデータを取得
        return view('player_info', compact('players')); // ビューにデータを渡す
    }

}
