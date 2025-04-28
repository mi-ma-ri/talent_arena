<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;


class playerPostEmailAuthRequest extends FormRequest

{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'email' => [
        'required',
        'max:255',
        function ($attribute, $value, $fail) {
          $encryptedEmail = encrypt($value); // メールアドレスを暗号化
          if (DB::table('players')->where('ms', $encryptedEmail)->exists()) {
            $fail('すでにこのアドレスは登録されています。');
          }
        },
        function ($attribute, $value, $fail) {
          if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $value)) {
            $fail('メールアドレスの形式が正しくありません。');
          }
        },
      ],
    ];
  }

  public function messages(): array
  {
    return [
      'email.required' => 'メールアドレスは入力必須項目です。',
      'email.unique' => 'すでにこのアドレスは登録されています。',
      'email.max' => 'メールアドレスは255文字以内で入力してください。'
    ];
  }
}
