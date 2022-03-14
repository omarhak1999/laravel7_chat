<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class Moderator
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
            1=>'admin',
            3=>'home',
        ];
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        if(Auth::user()->role!=2)
        {
            return redirect()->route($roles[Auth::user()->role]);
        }
        return $next($request);
    }
}
