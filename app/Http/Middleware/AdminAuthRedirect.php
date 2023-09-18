<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Session;

class AdminAuthRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!AdminController::isLoggedIn()){
            return redirect()->route('login');
        }
        // 檢查是否存在記住的路由
        if (Session::has('remembered_route')) {
            $rememberedRoute = Session::get('remembered_route');
            Session::forget('remembered_route'); // 清除 Session 中的記住的路由
            return redirect($rememberedRoute); // 執行跳轉到記住的路由
        }

        return $next($request);
    }
}
