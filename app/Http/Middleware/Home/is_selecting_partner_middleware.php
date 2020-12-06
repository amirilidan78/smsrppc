<?php

namespace App\Http\Middleware\Home;

use App\Http\Sessions\PartnerSessionHandler;
use Closure;
use Illuminate\Http\Request;

class is_selecting_partner_middleware
{

    public function handle(Request $request, Closure $next)
    {
        if ( PartnerSessionHandler::get_partner_is_authorizing() ){
            toast('لطفا مراحل احراز هویت را تکمیل کنید','warning');
            return redirect()->route('authorizing_partner') ;
        }

        return $next($request);
    }
}
