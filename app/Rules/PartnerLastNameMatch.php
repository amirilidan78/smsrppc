<?php

namespace App\Rules;

use App\Http\Sessions\PartnerSessionHandler;
use Illuminate\Contracts\Validation\Rule;

class PartnerLastNameMatch implements Rule
{
    private $last_name ;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->last_name = PartnerSessionHandler::get_partner()['last_name'] ;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return trim($this->last_name) == trim($value) ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'نام خانوادگی سهام دار اشتباه انتخاب شده است';
    }
}
