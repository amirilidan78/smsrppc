<?php


namespace App\Http\Sessions\Traits\Partner;


trait tempUpdatedPartnerTrait
{
    private static $temp_updated_partner = 'temp_updated_partner' ;

    public static function get_temp_updated_partner()
    {
        return session(self::$temp_updated_partner);
    }

    public static function put_temp_updated_partner(array $temp)
    {
        request()->session()->put(self::$temp_updated_partner ,$temp);
    }

    public static function pull_temp_updated_partner()
    {
        request()->session()->pull(self::$temp_updated_partner);
    }
}
