<?php

namespace App\Http\Middleware\Home;

use App\Http\Sessions\PartnerSessionHandler;
use Closure;
use Illuminate\Http\Request;

class is_authorizing_middleware
{
    public function handle(Request $request, Closure $next)
    {
        if ( PartnerSessionHandler::get_partner_is_submitting() ){
            toast('لطفا اطالاعات سهام دار را تکمیل کنید','warning');
            return redirect()->route('submitting_partner_data');
        }

        if ( PartnerSessionHandler::get_invalid_data() ){
            toast('احراز هویت نا موفق بود , لطفا دوباره تلاش کنید .','error');
            return redirect()->route('home');
        }

        if ( empty(PartnerSessionHandler::get_partner()) || empty(PartnerSessionHandler::get_partner_is_authorizing()) ){
            toast('لطفا شماره عضویت سهام دار را وارد کنید','error');
            return redirect()->route('home');
        }

        return $next($request);
    }
}
