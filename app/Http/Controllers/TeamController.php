<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lib\YoutubeClient;
use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\VideoPosts;
use App\Models\ScoutsTeam;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{

  /*該当チームに投稿した選手の情報と投稿詳細ボタンが表示される
    $playersには、scouts_team_id が $teamIds と一致するレコードがある Playerレコードを取得する条件を設定
    併せて関連モデルとなるvideoPostsの値を取得する場合はwithメソッドで条件を設定
  */
  public function players_list () 
  {
    $teamIds = Auth::guard('teams')->id(); // ログインしているチームのIDを取得
    $players = Player::WhereHas('videoPosts', function($query) use ($teamIds) {
      $query->where('scouts_team_id', $teamIds);
    })->with(['videoPosts' => function($query) use ($teamIds) {
      $query->where('scouts_team_id', $teamIds);
    }])->get();
    
    return view('team_playerlist', compact('players'));
  }

  // 各選手の投稿詳細画面を表示される
  public function url_point_list($id)  
  {
    $videoPosts = VideoPosts::findOrFail($id);

    // app/LibのYoutubeClint.phpを呼び出し
    $youtubeClient = new YoutubeClient();

    // youtube動画のサムネイル表示
    $videoPosts->thumbnail_url_1 = $youtubeClient->getYouTubeThumbnailUrl($videoPosts->post_url_1);
    $videoPosts->thumbnail_url_2 = $youtubeClient->getYouTubeThumbnailUrl($videoPosts->post_url_2);
    $videoPosts->thumbnail_url_3 = $youtubeClient->getYouTubeThumbnailUrl($videoPosts->post_url_3);

    // youtube動画のタイトル表示
    $videoPosts->title_1 = $youtubeClient->getYouTubeVideoTitle($videoPosts->post_url_1);
    $videoPosts->title_2 = $youtubeClient->getYouTubeVideoTitle($videoPosts->post_url_2);
    $videoPosts->title_3 = $youtubeClient->getYouTubeVideoTitle($videoPosts->post_url_3);

    return view('url_point', compact('videoPosts'));
  }

  // 現在ログインしているチームを取得。ログイン後、チーム情報を表示。
  public function team_register_info() 
  {
    $team = Auth::guard('teams')->user(); 
    return view('team_info', compact('team')); 
  }
}