<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreUserValidation extends FormRequest
{

    public function authorize()
    {
        return auth()->user()->can('access-users');
    }


    public function rules()
    {
        return [
            'name' => 'required|min:3' ,
            'phone' => [ 'required','regex:^(\+98|0)?9\d{9}$^','unique:users'] ,
            'password' => [ 'required','min:8'] ,
        ];
    }

}
