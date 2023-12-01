<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function player_register_info() 
    {
        $players = Player::all(); // すべてのユーザーデータを取得
        return view('player_info', compact('players')); // ビューにデータを渡す
    }

}
