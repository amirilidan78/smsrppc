<?php


namespace App\Http\Sessions\Traits\Partner;


trait partnerIsAuthorizingTrait
{

    private static $partner_is_authorizing = 'partner_is_authorizing' ;

    public static function get_partner_is_authorizing()
    {
        return session(self::$partner_is_authorizing) ;
    }

    public static function active_partner_is_authorizing()
    {
        request()->session()->put(self::$partner_is_authorizing ,true);
    }

    public static function disable_partner_is_authorizing()
    {
        request()->session()->pull(self::$partner_is_authorizing);
    }


}
