<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\ValidateUserPasswordUsingPhone;
use App\Rules\Recaptcha;
use App\Rules\PartnerCanBeModify;
use App\Rules\PartnerExist;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class AuthValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => [ 'required','numeric','regex:^(\+98|0)?9\d{9}$^','exists:users,phone'] ,
            'password' => [ 'required','min:8' , new ValidateUserPasswordUsingPhone($this->phone)] ,
            'g-recaptcha-response' => [ 'required' , new Recaptcha ]
        ];
    }

}
