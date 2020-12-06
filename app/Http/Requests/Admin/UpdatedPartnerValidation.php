<?php

namespace App\Http\Requests\Admin;

use App\Rules\CodeMelli;
use Illuminate\Foundation\Http\FormRequest;

class UpdatedPartnerValidation extends FormRequest
{

    public function authorize()
    {
        return auth()->user()->can('access-updated-partners');
    }

    public function rules()
    {
        return [
            'smsText' => 'nullable' ,
            'action' => 'required|in:accepted,rejected,deleted' ,
            'action_at' => 'required' ,
            'name' => 'required|min:3' ,
            'last_name' => 'required|min:3' ,
            'father_name' => 'required|min:3' ,
            'gender' => 'required|in:مرد,زن' ,
            'code_melli' => ['required','numeric', new CodeMelli] ,
            'certificate_id' => 'required|numeric' ,
            'birth_date' => 'required' ,
            'birth_place' => 'required' ,
            'dead_date' => [ 'nullable' ] ,
            'dead_description' => [ 'nullable' ] ,
            'phone' => [ 'required','numeric','regex:^(\+98|0)?9\d{9}$^'] ,
            'address' => 'required|min:3' ,
            'post_code' => ['required' ,'numeric' ,'digits:10'],
            'shaba' => ['nullable' ,'numeric' ,'digits:24'] ,
        ];
    }

}
