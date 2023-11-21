<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Sport;
use Illuminate\Http\Request;
use App\Http\Requests\formValidation;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Player
     */
    public function store(formValidation $request)
    {
        $validatedData = $request->validated(); 

        $player = new Player;
        // player_register.bladeからpostされた値
        $player->email = $request->input('address');
        $player->password = Hash::make($request->input('password'));
        $player->sports_id = $request->input('sport_id');
        $player->full_name = $request->input('firstName') . ' ' . $request->input('lastName'); // 姓と名を結合
        $player->gender = $request->input('gender');
        $player->birthday = $request->input('birthday');
        $player->current_team = $request->input('team_name');
        $player->position = $request->input('position');

        $player->save();
        return redirect('/completion_register');
    }

    public function getSportsName()
    {
        $sports = Sport::all(); // Sportモデルを使ってすべてのスポーツを取得
        return view('auth.player_register', compact('sports')); // ビューに1.サッカー2.野球3.バスケの選択肢データをcompact関数によって渡している。
    }

    public function choose()
    {
        return view('choose_register');
    }

    public function player()
    {
        return view('auth.player_register');
    }

    public function scout()
    {
        return view('auth.scout_register');
    }
    public function completion()
    {
        return view('completion_register');
    }
}
