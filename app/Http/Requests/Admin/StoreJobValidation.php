<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreJobValidation extends FormRequest
{

    public function authorize()
    {
        return auth()->user()->can('access-jobs');
    }

    public function rules()
    {
        return [
            'phone' => [ 'required','regex:^(\+98|0)?9\d{9}$^'] ,
            'smsText' => [ 'required','min:8'] ,
        ];
    }

}
