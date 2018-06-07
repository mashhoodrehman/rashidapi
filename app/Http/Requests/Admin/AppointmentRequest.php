<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'status' => 'required|in:RESERVED,CONFIRMED,CANCELED,SERVED',
            'scheduled_on' => 'required|date_format:Y-m-d H:i:s|after_or_equal:today',
            'service_id' => 'required|exists:services,id'
        ];
    }
}
