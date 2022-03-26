<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class createAboutRequest extends FormRequest
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
            'ab_description' => 'required',
            'ab_address' => 'required',
            'ab_email' => 'required|email',
            'ab_phone' => 'required|numeric|digits:10',
            'ab_openH' => 'required',
            'ab_map' => 'required',
            'ab_img' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'ab_description.required' => 'Dữ Liệu không để trống',
            'ab_address.required' => 'Dữ Liệu không để trống',
            'ab_email.required' => 'Dữ Liệu không để trống',
            'ab_phone.required' => 'Dữ Liệu không để trống',
            'ab_phone.numeric' => 'Bạn nhập không phải là số.',
            'ab_phone.digits' => 'SĐT bạn nhập thừa hơn 10 ký tự.',
            'ab_openH.required' => 'Dữ Liệu không để trống',
            'ab_map.required' => 'Dữ Liệu không để trống',
            'ab_img.required' => 'Dữ Liệu không để trống',
            'ab_img.image' => 'Định dạng dữ liệu là image',
            'ab_email.email' => 'Định dạng dữ liệu là email',
        ];
    }
}
