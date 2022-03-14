<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $roles=[
            2=>'moderator',
            3=>'home',
        ];
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        if(Auth::user()->role!=1)
        {
            return redirect()->route($roles[Auth::user()->role]);
        }
        return $next($request);
    }
}
