<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class createMenuRequest extends FormRequest
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
            'm_name' => 'required',
            'm_url' => 'required',
            'm_description' => 'required|max:255',
            'm_status' => 'required',
            'm_avatar' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'm_name.required' => 'Dữ Liệu không để trống',
            'm_url.required' => 'Dữ Liệu không để trống',
            'm_description.required' => 'Dữ Liệu không để trống',
            'm_description.max' => 'Dữ Liệu không được nhiều hơn 255 kí tự',
            'm_status.required' => 'Dữ Liệu không để trống',
            'm_avatar.required' => 'Dữ Liệu không để trống',
            'm_avatar.image' => 'Định dạng dữ liệu không đúng img.',
        ];
    }
}
