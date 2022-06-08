<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UserSettingRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:100',
            'old_password' => 'nullable',
        ];
        if (request('old_password')) {
            $rules['new_password'] = 'required|min:8';
            $rules['confirm_password'] = 'required|same:new_password';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên tài khoản không được để trống',
            'new_password.required' => 'Bạn chưa nhập mật khẩu mới',
            'new_password.min' => 'Mật khẩu phải nhập tối thiểu 6 ký tự',
            'confirm_password.required' => 'Bạn chưa xác nhận lại mật khẩu',
            'confirm_password.same' => 'Mật khẩu không khớp',
        ];
    }
}
