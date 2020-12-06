<?php

namespace App\Http\Middleware\Home;

use App\Http\Sessions\PartnerSessionHandler;
use Closure;
use Illuminate\Http\Request;

class is_submitting_middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ( !PartnerSessionHandler::get_partner_is_submitting() ){
            toast('لطفا مراحل احراز هویت را تکمیل کنید','warning');
            return redirect()->route('authorizing_partner');
        }
        return $next($request);
    }
}
