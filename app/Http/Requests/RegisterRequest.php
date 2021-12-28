<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|unique:users',
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
                'confirmed',
            ],
            'email' => 'required|email|unique:users',
            'phone_number' => [
                'nullable',
                'regex:/([\+84|84|0]+(3|5|7|8|9|1[2|6|8|9]))+([0-9]{8})\b/'
            ],
            'address' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Tên đăng nhập là bắt buộc',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'password.required' => 'Mật khẩu là bắt buộc',
            'password.min' => 'Mật khẩu phải có độ dài tối thiểu 8 ký tự',
            'password.confirmed' => 'Nhập lại mật khẩu không hợp lệ',
            'password.regex' => 'Mật khẩu phải bao gồm chữ hoa, chữ thường, chữ số và kí tự đặc biệt',
            'email.required' => 'Email là bắt buộc',
            'email.email' => 'Email sai định dạng',
            'email.unique' => 'Email đã tồn tại',
            'phone_number.regex' => 'Số điện thoại không hợp lệ',
        ];
    }
}
