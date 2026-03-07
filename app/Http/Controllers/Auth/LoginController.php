<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use App\Services\PlayerLoginService;
use App\Services\TeamLoginService;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    # 選手ログイン画面
    public function getPlayerAttempt()
    {
        return view('auth.attempt');
    }

    # ログイン処理
    public function postPlayerLogin(LoginRequest $request, PlayerLoginService $login_service)
    {
        $token = $login_service->auth($request->email, $request->password);
        session(['token' => $token]);

        return redirect('/player/info');
    }

    # チームログイン画面
    public function getTeamAttempt()
    {
        return view('auth.team_attempt');
    }

    # ログイン処理
    public function postTeamLogin(LoginRequest $request, TeamLoginService $login_service)
    {
        $token = $login_service->teamAuth($request->email, $request->password);
        session(['token' => $token]);

        return redirect('/team/info');
    }

    public function logout(Request $request)
    {
        // sessionからtokenを削除                                                                                              
        $request->session()->forget('token');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.get.attempt');
    }
}
