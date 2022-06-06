<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required',
            'max_users' => 'required',
            'expired_at' => 'required'
        ];
        if (request('avatar')) {
            $rules['avatar'] = 'mimes:jpg,jpeg,png| max:5128';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên công ty không được để trống',
            'max_users.required' => 'Giới hạn user không được để trống',
            'expired_at.required' => 'Ngày hết hạn không được để trống',
        ];
    }
}
