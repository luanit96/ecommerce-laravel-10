<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'name' => 'bail|required|min:3|max:50',
            'email' => 'bail|required|email:rfc,dns',
            'password' => 'bail|required|confirmed|min:6',
            'password_confirmation' => 'bail|required|min:6'
        ];
    }
}
