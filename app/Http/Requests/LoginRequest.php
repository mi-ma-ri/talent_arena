<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class LoginRequest extends FormRequest

{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
      return [
        'email' => 'required|email',
        'password' => [
          'required',
          'string',
          'min:8',   // 最小8文字
          'max:16',  // 最大16文字
          'regex:/^[A-Za-z0-9]+$/'  // 半角英数字のみ
        ],
      ];
    }

  public function messages(): array
  {
    return [
      'email.required' => 'メールアドレスは入力必須項目です。',
      'email.email' => 'メールアドレスの形式が正しくありません。',
      'email.unique' => 'すでにこのアドレスは登録されています。',
      'password.required' => 'パスワードは必須項目です。',
      'password.min' => 'パスワードは最低8文字以上である必要があります。',
      'password.max' => 'パスワードは最大16文字までです。',
      'password.regex' => 'パスワードは半角英数字である必要があります。',
    ];
  }
}
