<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'isbn' => 'max:13',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'author' => '著者',
            'isbn' => 'isbn番号',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => ':attributeは必須項目です',
            'author.required' => ':attributeは必須項目です',
            'title.max' => ':attributeは255文字以内で入力してください',
            'author.max' => ':attributeは255文字以内で入力してください',
            'isbn.max' => ':attributeは13文字以内で入力してください',
        ];
    }
}
