<?php

namespace App\Http\Requests;

use App\Http\Sessions\PartnerSessionHandler;
use App\Rules\CodeMelli;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PartnerSubmittingDataValidation extends FormRequest
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
        $temp = PartnerSessionHandler::get_temp_updated_partner();
        $is_dead = $temp['is_dead']; // 0  => alive , 1 => dead
        $gender = $temp['gender']; // مرد , زن
        $is_old = request()->birth_year > 1350;

        return [
            'partner_id' => 'required',
            'name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'father_name' => 'required|min:3',
            'gender' => 'required|in:مرد,زن',
            'code_melli' => ['required', 'numeric', new CodeMelli],
            'certificate_id' => 'required|numeric',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'dead_date' => [Rule::requiredIf(($is_dead))],
            'dead_description' => [Rule::requiredIf(($is_dead)), 'min:3'],
            'phone' => ['required', 'numeric', 'regex:^(\+98|0)?9\d{9}$^'],
            'address' => 'required|min:3',
            'post_code' => ['required', 'numeric', 'digits:10'],
            'shaba' => ['nullable', 'numeric', 'digits:24'],
            'national_card_picture' => 'required|image|max:2048',
            'certificate_id_picture' => 'required|image|max:2048',
            'men_card_service_picture' => [Rule::requiredIf(($is_old && $gender == 'مرد' && !$is_dead)), 'image', 'max:2048'],
            'probate_picture' => [Rule::requiredIf($is_dead), 'image', 'max:2048'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'birth_date' => $this->birth_year . '/' . $this->birth_month . '/' . $this->birth_day,
            'dead_date' => $this->dead_year ? $this->dead_year . '/' . $this->dead_month . '/' . $this->dead_day : null,
        ]);
    }
}
