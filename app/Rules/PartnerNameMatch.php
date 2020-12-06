<?php

namespace App\Rules;

use App\Http\Sessions\PartnerSessionHandler;
use Illuminate\Contracts\Validation\Rule;

class PartnerNameMatch implements Rule
{
    private $name ;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->name = PartnerSessionHandler::get_partner()['name'] ;
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
        return trim($this->name) == trim($value) ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'نام سهام دار اشتباه انتخاب شده است';
    }
}
