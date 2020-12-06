<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UpdateUserValidation extends FormRequest
{

    public function authorize()
    {
        return auth()->user()->can('access-users');
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3' ,
            'phone' => [ 'required','regex:^(\+98|0)?9\d{9}$^',Rule::unique('users')->ignore($this->user)] ,
            'password' => ['min:8'] ,
        ];
    }

    public function prepareForValidation()
    {
        if ( empty($this->password) ){
            $this->merge([
                'password' => $this->user->password
            ]) ;
        }
    }
}
