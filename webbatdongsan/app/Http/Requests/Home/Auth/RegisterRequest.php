<?php
namespace App\Http\Requests\Home\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'fullname' => ['required', 'between:1,255'],
            'email' => ['required', 'between:1,255', 'unique:user,email'],
            'username' => ['between:3,50', 'required', 'unique:user,username'],
            'password' => ['required', 'between:3,100'],
            'confirmpassword' => ['same:password', 'required'],
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return config('constants.validate_message');
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return config('constants.validate_attribute_alias');
    }
}
