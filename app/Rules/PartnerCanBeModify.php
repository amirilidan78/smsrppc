<?php

namespace App\Rules;

use App\Models\UpdatedPartner;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class PartnerCanBeModify implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        $updated_partner = UpdatedPartner::where('partner_id',$value)->count() ;
        return $updated_partner == 0 ? true : false  ;
    }


    public function message()
    {
        return 'اطلاعات سهام دار قبلا تکمیل شده است';
    }
}
