<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;


class PlayerPostEmailAuthRequest extends FormRequest

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
      'email.email' => ':attributeの形式で入力してください。',
    ];
  }
}
