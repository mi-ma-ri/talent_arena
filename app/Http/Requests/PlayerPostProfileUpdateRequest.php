<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerPostProfileUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'address' => ['required', 'email'],
            'position' => 'required|string|max:100|regex:/^[a-zA-Zぁ-んァ-ン一-龠]+$/u'
        ];
    }

    public function messages(): array
    {
        return [
            'address.required' => 'メールアドレスは入力必須項目です。',
            'address.email' => 'メールアドレスの形式が正しくありません。',
            'position.required' => 'ポジションは入力必須項目です。',
            'position.max' => 'ポジションは最大100文字までです。',
            'position.regex' => 'ポジション名に無効な文字が含まれています。'
        ];
    }
}
