<?php

namespace App\Http\Requests;

use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;

class ResetPartnerIdValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3' ,
            'last_name' => 'required|min:3' ,
            'father_name' => 'required|min:3' ,
            'phone' => [ 'required','numeric','regex:^(\+98|0)?9\d{9}$^','unique:partner_reset_ids'] ,
            'cart_melli_picture' => 'required|image|max:2048' ,
            'g-recaptcha-response' => [ 'required' , new Recaptcha ]
        ];
    }

    public function messages()
    {
        return [
            'phone.unique' => "یک درخواست با این شماره در حال پردازش است"
        ];
    }
}
