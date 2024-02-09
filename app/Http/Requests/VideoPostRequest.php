<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class VideoPostRequest extends FormRequest

{
  public function authorize(): bool
  {
      return true;
  }

  public function rules(): array
  {
    return [
      'day' => 'required|date|before_or_equal:today',
      'team_id' => 'required',
      'url1' => 'required|url',
      'point1' => 'required|max:100',
      'url2' => 'nullable|url',
      'point2' => 'nullable|max:100',
      'url3' => 'nullable|url',
      'point3' => 'nullable|max:100'
    ];
  }

  public function messages(): array
  {
    return [
      'day.required' => '投稿日は入力必須項目です。',
      'before_or_equal' => '未来の日付は選択できません。',
      'team_id.required' => '投稿先チームは選択必須項目です。',
      'url1.required' => '投稿URLは必須項目です。',
      'url1.url' => '無効なURLです。有効なURLを入力してください。',
      'point1.required' => '閲覧ポイント1は入力必須項目です',
      'point1.max' => '100文字以内で入力してください',
      'url2.url' => '無効なURLです。有効なURLを入力してください。',
      'point2.max' => '100文字以内で入力してください',
      'url3.url' => '無効なURLです。有効なURLを入力してください。',
      'point3.max' => '100文字以内で入力してください'
    ];
  }
}
