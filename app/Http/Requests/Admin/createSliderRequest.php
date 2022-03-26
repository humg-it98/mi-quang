<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class createSliderRequest extends FormRequest
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
            'sli_name' => 'required',
            'sli_description' => 'required',
            'sli_button' => 'required',
            'sli_url' => 'required',
            'sort_by' => 'required',
            'sli_status' => 'required',
            'sli_avatar' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'sli_name.required' => 'Dữ Liệu không để trống',
            'sli_description.required' => 'Dữ Liệu không để trống',
            'sli_button .required' => 'Dữ Liệu không để trống',
            'sli_url.required' => 'Dữ Liệu không để trống',
            'sort_by.required' => 'Dữ Liệu không để trống',
            'sli_status.required' => 'Dữ Liệu không để trống',
            'sli_avatar.image' => 'Định dạng phải là ảnh.',
        ];
    }
}
