<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class ModeratorLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo="moderator/dashboard";
    public function showLoginForm()
    {
        return view('auth.moderator.login');
    }

    protected function guard()
    {
        return Auth::guard("moderator");
    }

    public function __construct()
    {
        $this->middleware('guest:moderator,moderator/dashboard')->except('logout');
    }
}
