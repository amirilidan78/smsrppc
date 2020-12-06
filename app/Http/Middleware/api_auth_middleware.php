<?php

namespace App\Http\Middleware;

use App\Models\PersonalAccessToken;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class api_auth_middleware
{

    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization') ;

        Str::replaceFirst('Bearer ' ,'' ,$token);
        dd($token);
//        PersonalAccessToken::where('token')

        return $next($request);
    }
}
