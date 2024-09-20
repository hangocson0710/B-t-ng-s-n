<?php

namespace App\Http\Requests\Admin\System;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInfoRequest extends FormRequest
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
        $validate = [
            'about_logo'=>['image'],
            'about_address'=>['required','between:1,255'],
            'about_phone'=>['required','between:5,15'],
            'about_email'=>['required','between:5,255'],
            'about_facebook'=>['nullable','between:5,255'],
            'about_youtube'=>['nullable','between:5,255'],
            'about_info'=>['required','between:5,1000'],
        ];
        return $validate;
    }
    public function messages()
    {
        return config('constants.validate_message');
    }
    public function attributes()
    {
        return config('constants.validate_attribute_alias');
    }
}
