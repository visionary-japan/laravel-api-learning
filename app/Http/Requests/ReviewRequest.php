<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'book_id' => 'required|integer',
            'user_id' => 'required|integer',
            'rating' => 'required|integer|between:1,5',
        ];
    }

    public function attributes()
    {
        return [
            'book_id' => '本ID',
            'user_id' => 'ユーザーID',
            'rating' => '評価',
        ];
    }

    public function messages()
    {
        return [
            'book_id.required' => ':attributeは必須項目です',
            'book_id.integer' => ':attributeは数字で入力してください',
            'user_id.required' => ':attributeは必須項目です',
            'user_id.integer' => ':attributeは数字で入力してください',
            'rating.required' => ':attributeは必須項目です',
            'rating.between' => ':attributeは数字で:min以上:max以下にしてください。',
        ];
    }
}
