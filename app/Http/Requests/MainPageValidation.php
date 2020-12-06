<?php

namespace App\Http\Requests;

use App\Rules\Recaptcha;
use App\Rules\PartnerCanBeModify;
use App\Rules\PartnerExist;
use Illuminate\Foundation\Http\FormRequest;

class MainPageValidation extends FormRequest
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
            'partner_id' =>[ 'required','numeric' , new PartnerExist  , new PartnerCanBeModify ] ,
            'g-recaptcha-response' => [ 'required' , new Recaptcha ]
        ];
    }
}
