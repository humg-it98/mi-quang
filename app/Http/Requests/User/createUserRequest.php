<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class createUserRequest extends FormRequest
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
            //
            'email' => 'required|unique:users,email,' . $this->id,
            'name' => 'required',
//            'avatar' => 'image',
        ];
    }
    public function messages()
    {
        return [
            'email.unique' => 'Địa chỉ email đã tồn tại trên hệ thống.Vui lòng nhập email khác',
            'email.required' => 'Vui lòng nhập email',
            'name.required' => 'Vui lòng nhập tên',
//            'avatar.image' => 'Vui lòng nhập đúng định dạng',
        ];
    }
}
