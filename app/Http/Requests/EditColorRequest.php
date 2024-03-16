<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditColorRequest extends FormRequest
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
            'name' => 'bail|required|min:1|max:30',
            'image_path' => 'bail|file|image',
            'quantity' => 'bail|required|numeric|min:0'
        ];
    }
}
