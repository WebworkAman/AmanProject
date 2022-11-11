<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Libraries\MemberAuth;

class MemberAuthRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure $next
     * @return mixed 
     */

    // @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
    // @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    public function handle(Request $request, Closure $next)
    {
        if(!MemberAuth::isLoggedIn()){
            return redirect()->route('members.session.create');
        }
        return $next($request);
    }
}
