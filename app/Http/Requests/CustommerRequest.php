<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustommerRequest extends FormRequest
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
            'name' => 'bail|required|min:1|max:255',
            'phone' => 'bail|required|numeric|min:10',
            'address' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên không được bỏ trống',
            'name.min' => 'Tên tối đa 1 kí tự',
            'name.max' => 'Tên tối đa 255 kí tự',
            'phone.required' => 'Số điện thoại không được bỏ trống',
            'phone.numeric' => 'Số điện thoại phải là chữ số',
            'phone.min' => 'Số điện thoại không hợp lệ, tối thiểu 10 kí tự',
            'address.required' => 'Địa chỉ không được bỏ trống'
        ];
    }
}
