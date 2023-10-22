<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_name' => 'required|max:255',
            'email' => 'max:255|email:filter',
        ];
    }

    public function attributes()
    {
        return [
            'user_name' => 'ユーザー名',
            'email' => 'メールアドレス',
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => ':attributeは必須項目です',
            'user_name.max' => ':attributeは255文字以内で入力してください',
            'email.max' => ':attributeは255文字以内で入力してください',
            'email.email' => ':attributeは正しいメールアドレスの形式で入力してください',
        ];
    }
}
