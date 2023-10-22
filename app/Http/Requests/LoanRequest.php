<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
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
            'loan_date' => 'required|date',
            'due_date' => 'required|date',
        ];
    }

    public function attributes()
    {
        return [
            'book_id' => '本ID',
            'user_id' => 'ユーザーID',
            'loan_date' => '貸出日',
            'due_date' => '返却期日',
        ];
    }

    public function messages()
    {
        return [
            'book_id.required' => ':attributeは必須項目です',
            'user_id.required' => ':attributeは必須項目です',
            'loan_date.required' => ':attributeは必須項目です',
            'due_date.required' => ':attributeは必須項目です',
            'book_id.integer' => ':attributeは数字で入力してください',
            'user_id.integer' => ':attributeは数字で入力してください',
            'loan_date.date' => ':attributeは日付を入力してください',
            'due_date.date' => ':attributeは日付を入力してください',
        ];
    }
}
