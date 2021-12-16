<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffCreateRequest extends FormRequest
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
            'name' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'required',
            'email' => 'required|email',
            'salary' => 'required',
            'staff_role_id' => 'required|numeric',
            'pilot_rating_id' => 'numeric',
            'address' => 'required|string'
        ];
    }

    public function attributes()
    {
        return [
            'staff_role_id' => 'staff role',
            'pilot_rating_id' => 'pilot rating'
        ];
    }
}
