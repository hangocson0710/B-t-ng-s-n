<?php

namespace App\Http\Requests\Admin\Staff;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStaffRequest extends FormRequest
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
            'admin_fullname' => ['required', 'between:3,100'],
            'admin_email' => ['required', 'email', 'between:3,100',
                Rule::unique('admin', 'admin_email')->ignore($this->route('id'))],
            'admin_phone' => ['required', 'between:3,15',
                Rule::unique('admin', 'admin_phone')->ignore($this->route('id'))],
            'admin_username' => ['required', 'between:3,50',
                Rule::unique('admin', 'admin_username')->ignore($this->route('id'))],
            'role' => ['required', 'string'], // Updated to 'string' to match role_name in admin table
            'admin_image' => ['nullable', 'image'],
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
