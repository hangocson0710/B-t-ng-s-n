<?php
namespace App\Http\Requests\Admin\Staff;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddStaffRequest extends FormRequest
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
            'admin_fullname' => ['required', 'between:3,100'],
            'admin_email' => ['required', 'email', 'between:3,100', 'unique:admin,admin_email'],
            'admin_phone' => ['required', 'between:3,15', 'unique:admin,admin_phone'],
            'admin_username' => ['required', 'between:3,50', 'unique:admin,admin_username'],
            'password' => ['required', 'between:6,100'],
            'password_confirmation' => ['required', 'between:6,100', 'same:password'],
            'role' => ['required', 'integer', 'exists:roles,id'], // validate role_id
            'admin_image' => ['nullable', 'image'],
        ];
    }

    public function messages()
    {
        return [
            'admin_fullname.required' => 'Họ tên là bắt buộc.',
            'admin_fullname.between' => 'Họ tên phải có độ dài từ 3 đến 100 ký tự.',
            'admin_email.required' => 'Email là bắt buộc.',
            'admin_email.email' => 'Email không hợp lệ.',
            'admin_email.between' => 'Email phải có độ dài từ 3 đến 100 ký tự.',
            'admin_email.unique' => 'Email đã tồn tại.',
            'admin_phone.required' => 'Số điện thoại là bắt buộc.',
            'admin_phone.between' => 'Số điện thoại phải có độ dài từ 3 đến 15 ký tự.',
            'admin_phone.unique' => 'Số điện thoại đã tồn tại.',
            'admin_username.required' => 'Tên đăng nhập là bắt buộc.',
            'admin_username.between' => 'Tên đăng nhập phải có độ dài từ 3 đến 50 ký tự.',
            'admin_username.unique' => 'Tên đăng nhập đã tồn tại.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.between' => 'Mật khẩu phải có độ dài từ 6 đến 100 ký tự.',
            'password_confirmation.required' => 'Xác nhận mật khẩu là bắt buộc.',
            'password_confirmation.between' => 'Xác nhận mật khẩu phải có độ dài từ 6 đến 100 ký tự.',
            'password_confirmation.same' => 'Xác nhận mật khẩu không khớp.',
            'role.required' => 'Vai trò là bắt buộc.',
            'role.integer' => 'Vai trò phải là số nguyên.',
            'role.exists' => 'Vai trò không tồn tại.',
            'admin_image.image' => 'Hình ảnh không hợp lệ.',
        ];
    }

    public function attributes()
    {
        return [
            'admin_fullname' => 'Họ tên',
            'admin_email' => 'Email',
            'admin_phone' => 'Số điện thoại',
            'admin_username' => 'Tên đăng nhập',
            'password' => 'Mật khẩu',
            'password_confirmation' => 'Xác nhận mật khẩu',
            'role' => 'Vai trò',
            'admin_image' => 'Hình ảnh',
        ];
    }
}
