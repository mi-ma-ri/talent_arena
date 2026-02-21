<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerPostUrlRequest extends FormRequest

{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'url1' => 'required|url',
      'url2' => 'nullable|url',
      'url3' => 'nullable|url',
      'description' => 'required|max:100'
    ];
  }

  public function messages(): array
  {
    return [
      'url1.required' => '投稿URLは必須項目です。',
      'url1.url' => '無効なURLです。有効なURLを入力してください。',
      'url2.url' => '無効なURLです。有効なURLを入力してください。',
      'url3.url' => '無効なURLです。有効なURLを入力してください。',
      'description.required' => '注目ポイントは必須項目です。',
      'description.max' => '100文字以内で入力してください'
    ];
  }
}
