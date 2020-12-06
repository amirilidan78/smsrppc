<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class DestroyResetValidation extends FormRequest
{

    public function authorize()
    {
        return auth()->user()->can('access-updated-partners');
    }

    public function rules()
    {
        return [
            'deleteDirectory' => ['nullable'] ,
            'smsText' => ['nullable', 'min:3'] ,
        ];
    }

}
