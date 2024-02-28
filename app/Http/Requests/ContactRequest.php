<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'content' => 'required'
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
            'name.min' => 'Tên phải ít nhất 1 kí tự',
            'name.max' => 'Tên không được dài quá 255 kí tự',
            'phone.required' => 'Số điện thoại không được bỏ trống',
            'phone.numeric' => 'Số điện thoại phải là chữ số',
            'phone.min' => 'Số điện thoại ít nhất 10 kí tự',
            'content.required' => 'Nội dung liên hệ không được bỏ trống'
        ];
    }
}
