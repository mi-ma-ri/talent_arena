<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamDetailsRequest extends FormRequest

{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'ground.0' => 'required|string|max:30',
      'ground.1' => 'nullable|string|max:30',
      'ground.2' => 'nullable|string|max:30',
      'member' => 'required|string|max:100',
      'staff' => 'required|string|max:30',
      'schedule' => 'required|string|max:100',
      'time' => 'required|string|max:30',
      'environ' => 'required|string|max:30',
      'expense' => 'required|string|max:30',
      'life' => 'required|string|max:30',
      'term' => 'required|string|max:30',
      'part_time' => 'required|boolean',
    ];
  }

  public function messages(): array
  {
    return [
      'ground.0.required' => 'グラウンド名は最低1つ入力必須項目です。',
      'ground.*.string' => '文字列で記入してください。',
      'ground.*.max' => 'グラウンド名は最大30文字です。',
      'member.required' => '部員数は入力必須項目です。',
      'member.max' => '部員数は最大100文字です。',
      'staff.required' => '監督名は入力必須項目です。',
      'staff.max' => '監督名は最大30文字です。',
      'schedule.required' => '週間予定は入力必須項目です。',
      'schedule.max' => '週間予定は最大100文字です。',
      'time.required' => '練習時間は入力必須項目です。',
      'time.max' => '練習時間は最大30文字です。',
      'environ.required' => 'グラウンド環境は入力必須項目です。',
      'environ.max' => 'グラウンド環境は最大30文字です。',
      'expense.required' => '諸経費は入力必須項目です。',
      'expense.max' => '諸経費は最大30文字です。',
      'life.required' => '寮生活は入力必須項目です。',
      'life.max' => '寮生活は最大30文字です。',
      'term.required' => '入部条件は入力必須項目です。',
      'term.max' => '入部条件は最大30文字です。',
      'part_time.required' => 'アルバイトは選択必須項目です。'
    ];
  }
}
