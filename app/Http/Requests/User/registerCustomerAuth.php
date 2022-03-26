<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class registerCustomerAuth extends FormRequest
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
            'cus_email' => 'required|email|unique:customer',
            'cus_name' => 'required',
            'cus_phone' => 'required|numeric',
            'password' => 'required|min:6',
            'password_confirm' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'cus_email.required' => 'Dữ Liệu không để trống.',
            'cus_email.unique' => 'Email đã được đăng ký.',
            'cus_email.email' => 'Dữ liệu phải là mail.',
            'cus_name.required' => 'Dữ Liệu không để trống.',
            'cus_phone.required' => 'Dữ Liệu không để trống.',
            'cus_phone.numeric' => 'Dữ Liệu không phải là số.',
            'password.required' => 'Dữ Liệu không để trống.',
            'password.min' => 'Mật khẩu ít nhất 6 kí tự.',
            'password_confirm.same' => 'Mật khẩu xác minh không trùng.',
        ];
    }
}
