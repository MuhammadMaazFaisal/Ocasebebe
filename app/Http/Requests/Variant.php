<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Variant extends FormRequest
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
            //
            'attribute_name'=>'required|unique:variants,variant|max:50',
        ];
    }

    public function messages()
    {
            return[
                'attribute_name.required' => 'Attribute Name field is required',
            ];
    }
}
