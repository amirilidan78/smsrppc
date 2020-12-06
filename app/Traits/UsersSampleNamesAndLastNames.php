<?php

namespace App\Traits ;

use App\Http\Sessions\PartnerSessionHandler;
use App\Models\Partner;

trait UsersSampleNamesAndLastNames

{
    private function sampleNames()
    {
        $user_id = PartnerSessionHandler::get_partner()['id'] ;
        $name = trim(Partner::find($user_id)->name) ;
        $names = Partner::where('id', '<>', $user_id)->distinct('name')->inRandomOrder()->take(10)->get()->pluck('name')->toArray() ;
        array_push( $names,$name);
        shuffle($names) ;
        return $names ;
    }

    private function sampleLastNames()
    {
        $user_id = PartnerSessionHandler::get_partner()['id'] ;
        $last_name = trim(Partner::find($user_id)->last_name) ;
        $last_names = Partner::where('id', '<>', $user_id)->distinct('last_name')->inRandomOrder()->take(10)->get()->pluck('last_name')->toArray() ;
        array_push( $last_names,$last_name);
        shuffle($last_names) ;
        return $last_names ;
    }
}
