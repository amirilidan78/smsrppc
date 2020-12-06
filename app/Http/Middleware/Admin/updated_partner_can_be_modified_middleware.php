<?php

namespace App\Http\Middleware\Admin;

use App\Http\Sessions\PartnerSessionHandler;
use App\Models\UpdatedPartner;
use Closure;
use Illuminate\Http\Request;

class updated_partner_can_be_modified_middleware
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
