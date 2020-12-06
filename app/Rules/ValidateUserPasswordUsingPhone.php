<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ValidateUserPasswordUsingPhone implements Rule
{

    public $user ;

    public function __construct($phone)
    {
        $this->user = User::wherePhone($phone)->first() ;
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
        if ( empty($this->user) )
            return  false ;

        return Hash::check($value , $this->user->password) ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'رمز عبور اشتباه است';
    }
}
