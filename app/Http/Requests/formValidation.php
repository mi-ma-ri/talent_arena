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
            'address' => 'required|email|unique:players',
            'password' => [
                'required',
                'string',
                'min:8',   // 最小8文字
                'max:16',  // 最大16文字
                'regex:/^[A-Za-z0-9]+$/'  // 半角英数字のみ
            ],
            'full_name' => 'required|string|max:100|regex:/^[a-zA-Zぁ-んァ-ン一-龠]+$/u',
            'gender' => [
                'required',
                'in:1,2' // 有効な値は "1"（男性）または "2"（女性）
            ],
            'birthday' => 'required|date|before:today',
            'current_team' => 'required|string|max:100|regex:/^[a-zA-Zぁ-んァ-ン一-龠]+$/u',
            'position' => 'required|string|max:100|regex:/^[a-zA-Zぁ-んァ-ン一-龠]+$/u'
        ];
    }

    public function messages(): array
    {
        return [
            'address.required' => 'メールアドレスは入力必須項目です。',
            'address.email' => 'メールアドレスの形式が正しくありません。',
            'password.required' => 'パスワードは必須項目です。',
            'password.min' => 'パスワードは最低8文字以上である必要があります。',
            'password.max' => 'パスワードは最大16文字までです。',
            'password.regex' => 'パスワードは半角英数字である必要があります。',
            'full_name.required' => '姓名は入力必須項目です。',
            'full_name.max' => '姓名は最大100文字までです。',
            'gender.required' => '性別は選択必須項目です。',
            'gender.in' => '選択された性別が無効です。',
            'birthday.required' => '誕生日は選択必須項目です。',
            'birthday.date' => '誕生日は有効な日付である必要があります。',
            'birthday.before' => '誕生日は今日より前の日付である必要があります。',
            'current_team.required' => '現所属チームは入力必須項目です。',
            'current_team.max' => '現所属チームは最大100文字までです。',
            'current_team.regex' => '現所属チーム名に無効な文字が含まれています。',
            'position.required' => 'ポジションは入力必須項目です。',
            'position.max' => 'ポジションは最大100文字までです。',
            'position.regex' => 'ポジション名に無効な文字が含まれています。',
        ];
    }
}
