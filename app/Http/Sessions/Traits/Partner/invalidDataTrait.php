<?php


namespace App\Http\Sessions\Traits\Partner;


trait invalidDataTrait
{
    private static $invalid_data = 'invalid_data' ;

    public static function flash_invalid_data()
    {
        request()->session()->flash(self::$invalid_data);
    }

    public static function get_invalid_data()
    {
        return request()->session()->get(self::$invalid_data);
    }


}
