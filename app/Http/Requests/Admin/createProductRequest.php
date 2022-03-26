<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class createProductRequest extends FormRequest
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
            'pro_name' => 'required|unique:product',
            'pro_price' => 'required',
            'pro_content' => 'required',
            'pro_description' => 'required',
            'pro_avatar' => 'required|image',
            'pro_category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pro_name.required' => 'Dữ Liệu không để trống',
            'pro_name.unique' => 'Tên món ăn đã có, thử lại tên khác.',
            'pro_price.required' => 'Dữ Liệu không để trống',
            'pro_content.required' => 'Dữ Liệu không để trống',
            'pro_description.required' => 'Dữ Liệu không để trống',
            'pro_avatar.required' => 'Dữ Liệu không để trống',
            'pro_avatar.image' => 'Dữ Liệu không phải là img',
            'pro_category_id.required' => 'Dữ Liệu không để trống',
        ];
    }
}
