<?php

namespace App\Http\Middleware;

use App\Consts\CommonConsts;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckNonMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        # 本登録済みの選手は、TOP画面にリダイレクト
        if (session()->get('player.status') == CommonConsts::IS_MEMBER) {
            return redirect()->route('index.top.index');
        }

        # 次処理に進む
        return $next($request);
    }
}
