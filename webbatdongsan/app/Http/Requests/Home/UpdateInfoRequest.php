<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
        $user = Auth::user();
        return [
            'avatar' => ['nullable', 'image'],
            'fullname' => ['required', 'max:255'],
            'phone' => ['required', 'max:15', Rule::unique('user', 'phone')->ignore($user->id)],
            'address' => ['required', 'max:255'],
            'province_id' => ['required', 'integer'],
            'district_id' => ['required', 'integer'],
            'ward_id' => ['required', 'integer'],
        ];
    }

    /**
     * Get custom messages for validator errors.
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
