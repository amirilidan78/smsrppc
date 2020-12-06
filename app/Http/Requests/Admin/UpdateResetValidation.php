<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdateResetValidation extends FormRequest
{

    public function authorize()
    {
        return auth()->user()->can('access-updated-partners');
    }

    public function rules()
    {
        return [
            'deleteDirectory' => ['nullable'] ,
            'smsText' => [ 'required','min:3'] ,
        ];
    }

}
