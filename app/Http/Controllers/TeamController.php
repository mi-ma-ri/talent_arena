<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\VideoPosts;


class TeamController extends Controller
{

  public function players_list () 
  {
    $players = Player::all(); // すべてのユーザーデータを取得
    return view('team_playerlist', compact('players'));
  }

  public function videos_list () 
  {
    $players = Player::with('video_posts')->get();
    return view('team_video_history', compact('players'));
  }

  public function url_point_list($id)  
  {
    $videoPosts = VideoPosts::findOrFail($id);
    return view('url_point', compact('videoPosts'));
  }
}