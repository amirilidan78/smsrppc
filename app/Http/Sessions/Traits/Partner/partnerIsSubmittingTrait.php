<?php


namespace App\Http\Sessions\Traits\Partner;


trait partnerIsSubmittingTrait
{

    private static $partner_is_submitting = 'partner_is_submitting' ;

    public static function get_partner_is_submitting()
    {
        return session(self::$partner_is_submitting) ;
    }

    public static function active_partner_is_submitting()
    {
        request()->session()->put(self::$partner_is_submitting ,true);
    }

    public static function disable_partner_is_submitting()
    {
        request()->session()->pull(self::$partner_is_submitting);
    }
}
