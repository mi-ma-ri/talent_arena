<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Sport;
use App\Http\Requests\UserRegisterRequest;
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
    public function store(UserRegisterRequest $request)
    {
        $validated = $request->validated();

        $player = new Player;
        $player->email = $validated['email'];
        $player->password = Hash::make($validated['password']);
        $player->sports_id = $validated['sports_id'];
        $player->full_name = $validated['full_name'];
        $player->gender = $validated['gender'];
        $player->birthday = $validated['birthday'];
        $player->current_team = $validated['team_name'];
        $player->position = $validated['position'];

        $player->save();
        return redirect('/completion-register');
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
    
    public function completion()
    {
        return view('completion_register');
    }
}