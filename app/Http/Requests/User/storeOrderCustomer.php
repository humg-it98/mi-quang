<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class storeOrderCustomer extends FormRequest
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
            'cus_name' => 'required',
            'cus_email' => 'required|email',
            'cus_phone' => 'required|numeric',
            'cus_address' => 'required|max:300',
            'tst_type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'cus_email.required' => 'Dữ Liệu không để trống.',
            'cus_email.email' => 'Dữ liệu phải là mail.',
            'cus_name.required' => 'Dữ Liệu không để trống.',
            'cus_phone.required' => 'Dữ Liệu không để trống.',
            'cus_phone.numeric' => 'Dữ Liệu không phải là số.',
            'cus_address.required' => 'Dữ Liệu không để trống.',
            'cus_address.max' => 'Dữ liệu quá dài, không đúng',
            'tst_type.required' => 'Dữ Liệu không để trống.',
        ];
    }
}
