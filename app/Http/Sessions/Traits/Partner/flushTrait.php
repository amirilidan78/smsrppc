<?php


namespace App\Http\Sessions\Traits\Partner;


trait flushTrait
{
    public static function flush()
    {
        self::disable_partner_is_submitting();
        self::pull_temp_updated_partner();
        self::disable_partner_is_authorizing();
        self::pull_partner();
    }
}
