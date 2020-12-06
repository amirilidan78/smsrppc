<?php


namespace App\Http\Sessions\Traits\Partner;


use App\Models\Partner;

trait partnerTrait
{

    private static $partner = 'partner';

    public static function get_partner() : Partner
    {
        return session(self::$partner);
    }

    public static function put_partner(Partner $partner)
    {
        request()->session()->put(self::$partner ,$partner);
    }

    public static function pull_partner()
    {
        request()->session()->pull(self::$partner);
    }
}
