<?php

namespace App\Rules;

use App\CodeBase\IranianCodeMelli;
use Illuminate\Contracts\Validation\Rule;

class CodeMelli implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $validator = new IranianCodeMelli() ;
        return $validator->nationalCode($value) ;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'کد ملی درست وارد نشده است';
    }
}
