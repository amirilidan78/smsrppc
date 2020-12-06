<?php

namespace App\Http\Requests;

use App\Http\Sessions\PartnerSessionHandler;
use App\Rules\PartnerLastNameMatch;
use App\Rules\PartnerNameMatch;
use Illuminate\Foundation\Http\FormRequest;

class PartnerAuthorizingValidation extends FormRequest
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
            'name' =>[ 'required' ,new PartnerNameMatch ] ,
            'last_name' => [ 'required' ,new PartnerLastNameMatch ] ,
            'gender' => 'required|in:مرد,زن' ,
            'is_dead' => 'required|in:1,0' ,
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            if ( $validator->errors()->any() )
            {
                PartnerSessionHandler::flush();
                PartnerSessionHandler::flash_invalid_data();
            }

        });
    }


}
