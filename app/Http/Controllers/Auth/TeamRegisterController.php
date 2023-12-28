<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scouts_team;
use App\Models\Sport;
use App\Http\Requests\TeamRegisterRequest;
use Illuminate\Support\Facades\Hash;

class TeamRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Scouts_team
     */
    public function store(TeamRegisterRequest $request)
    {
      $validated = $request->validated();

      $team = new Scouts_team;
      $team->sports_id = $validated['sports_id'];
      $team->email = $validated['email'];
      $team->password = Hash::make($validated['password']);
      $team->team_name = $validated['club_name'];

      $team->save();
      return redirect('/completion-register');
    }

    public function scout()
    {
        return view('auth.scout_register');
    }

    public function getSportsName()
    {
        $sports = Sport::all(); // Sportモデルを使ってすべてのスポーツを取得
        return view('auth.scout_register', compact('sports')); // ビューに1.サッカー2.野球3.バスケの選択肢データをcompact関数によって渡している。
    }
}