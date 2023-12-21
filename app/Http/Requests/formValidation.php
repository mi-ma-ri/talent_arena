<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class FormValidation extends FormRequest

{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:players',
            'password' => [
                'required',
                'string',
                'min:8',   // 最小8文字
                'max:16',  // 最大16文字
                'regex:/^[A-Za-z0-9]+$/'  // 半角英数字のみ
            ],
            'sport_id' => 'required',
            'full_name' => 'required|string|max:100|regex:/^[a-zA-Zぁ-んァ-ン一-龠]+$/u',
            'gender' => 'required',
            'birthday' => 'required|date|before:today',
            'team_name' => 'required|string|max:100|regex:/^[a-zA-Zぁ-んァ-ン一-龠]+$/u',
            'position' => 'required|string|max:100|regex:/^[a-zA-Zぁ-んァ-ン一-龠]+$/u',
            'day' => 'required|date|before:today',
            'team_id' => 'required',
            'url1' => 'required|url',
            'point1' => 'required|max:100'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'メールアドレスは入力必須項目です。',
            'email.email' => 'メールアドレスの形式が正しくありません。',
            'password.required' => 'パスワードは必須項目です。',
            'password.min' => 'パスワードは最低8文字以上である必要があります。',
            'password.max' => 'パスワードは最大16文字までです。',
            'password.regex' => 'パスワードは半角英数字である必要があります。',
            'sport_id.required' => '競技名は入力必須項目です。',
            'full_name.required' => '姓名は入力必須項目です。',
            'full_name.max' => '姓名は最大100文字までです。',
            'gender.required' => '性別は選択必須項目です。',
            'gender.in' => '選択された性別が無効です。',
            'birthday.required' => '生年月日は選択必須項目です。',
            'birthday.date' => '生年月日は有効な日付である必要があります。',
            'birthday.before' => '生年月日は今日より前の日付である必要があります。',
            'team_name.required' => '現所属チームは入力必須項目です。',
            'team_name.max' => '現所属チームは最大100文字までです。',
            'team_name.regex' => '現所属チーム名に無効な文字が含まれています。',
            'position.required' => 'ポジションは入力必須項目です。',
            'position.max' => 'ポジションは最大100文字までです。',
            'position.regex' => 'ポジション名に無効な文字が含まれています。',
            'day.required' => '投稿日は入力必須項目です。',
            'day.before' => '未来の日付は選択できません。',
            'team_id.required' => '投稿先チームは選択必須項目です。',
            'url1.required' => '投稿URLは必須項目です。',
            'url1.url' => '無効なURLです。有効なURLを入力してください。',
            'point1.required' => '閲覧ポイント1は入力必須項目です',
            'point1.max' => '100文字以内で入力してください'
        ];
    }
}
