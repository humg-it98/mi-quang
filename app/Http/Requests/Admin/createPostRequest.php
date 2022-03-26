<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class createPostRequest extends FormRequest
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
            'post_name' => 'required|unique:post',
            'post_content' => 'required',
            'post_description' => 'required',
            'post_avatar' => 'required|image',
            'post_cate_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'post_name.required' => 'Dữ Liệu không để trống',
            'post_name.unique' => 'Bài viết đã có, thử lại tên khác.',
            'post_content.required' => 'Dữ Liệu không để trống',
            'post_description.required' => 'Dữ Liệu không để trống',
            'post_avatar.required' => 'Dữ Liệu không để trống',
            'post_avatar.image' => 'Dữ Liệu không phải là img',
            'pro_category_id.required' => 'Dữ Liệu không để trống',
        ];
    }
}
