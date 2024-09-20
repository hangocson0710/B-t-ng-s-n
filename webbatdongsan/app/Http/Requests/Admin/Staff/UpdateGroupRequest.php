<?php

namespace App\Http\Requests\Admin\Staff;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGroupRequest extends FormRequest
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
            'group_name' => [
                'required',
                'between:3,100',
                Rule::unique('admin', 'role_name')->ignore($this->route('id'))
            ],
            'page' => ['required'],
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
