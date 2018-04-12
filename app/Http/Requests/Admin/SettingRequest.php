<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'app_title' => 'required',
            'clinic_name' => 'required',
            'doctor_name' => 'required',
            'mobile_number' => 'required',
            'email' => 'required',
            'address' => 'required',
            'latitude' => 'numeric',
            'longitude' => 'numeric'
        ];
    }
}
