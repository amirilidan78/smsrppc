<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function GuzzleHttp\Promise\all;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLogin()
    {
        return view('Auth.login');
    }

    public function login(AuthValidation $authValidation)
    {
        auth()->login(User::findUsingPhone($authValidation['phone'])) ;
        alert()->toast('شما با موفقیت وارد حساب کاربری خود شدید .' ,'success');
        return redirect()->route('admin.dashboard') ;
    }

    public function logout()
    {
        if ( auth()->user() )
            auth()->logout();

        alert()->toast('شما با موفقیت از حساب کاربری خود خارج شدید .' ,'success');
        return redirect()->route('auth.login') ;
    }
}
