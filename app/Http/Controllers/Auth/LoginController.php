<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Services\PlayerLoginService;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    # ログイン画面
    public function getPlayerLogin()
    {
        return view('auth.login');
    }

    # ログイン処理
    public function postPlayerLogin(LoginRequest $request, PlayerLoginService $login_service)
    {
        $login_service->postPlayerLogin($request->email, $request->password);
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        return redirect('/completion-logout');
    }

    public function completion_logout()
    {
        return view('completion_logout');
    }



    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
