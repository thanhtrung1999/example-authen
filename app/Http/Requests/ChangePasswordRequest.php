<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'current_password' => 'required|current_password',
            'new_password' => [
                'required',
                'min:8',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
                'confirmed',
            ],
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Không được để trống',
            'current_password.current_password' => 'Sai mật khẩu',
            'new_password.required' => 'Không được để trống',
            'new_password.min' => 'Độ dài phải tối thiểu 8 ký tự',
            'new_password.regex' => 'Mật khẩu phải bao gồm chữ hoa, chữ thường, chữ số và kí tự đặc biệt',
            'new_password.confirmed' => 'Nhập lại mật khẩu không hợp lệ'
        ];
    }
}
