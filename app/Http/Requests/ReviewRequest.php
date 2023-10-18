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
            'book_id' => 'required',
            'user_id' => 'required',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable',
        ];
    }

    public function attributes()
    {
        return [
            'book_id' => '本ID',
            'user_id' => 'ユーザーID',
            'rating' => '評価',
            'comment' => 'コメント',
        ];
    }

    public function messages()
    {
        return [
            'book_id.required' => ':attributeは必須項目です',
            'user_id.required' => ':attributeは必須項目です',
            'rating.required' => ':attributeは必須項目です',
            'rating.between' => ':attributeは数字で:min以上:max以下にしてください。',
        ];
    }
}
