<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class TeamPostEmailAuthRequest extends FormRequest

{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'email' => [
        'bail',
        'required',
        'email:rfc,dns',
      ],
    ];
  }

  public function messages(): array
  {
    return [
      'email.required' => ':attributeアドレスは入力必須です。',
      'email.email' => ':attributeの形式で入力してください。',
    ];
  }
}
