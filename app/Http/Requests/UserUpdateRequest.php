<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'full_name' => 'required|string|max:100|regex:/^[a-zA-Zぁ-んァ-ン一-龠ー・]+$/u',
            'birthday' => 'required|date|before:today',
            'team_name' => 'required|string|max:100',
            'position' => 'required|string|max:100|regex:/^[a-zA-Zぁ-んァ-ン一-龠]+$/u'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'メールアドレスは入力必須項目です。',
            'email.email' => 'メールアドレスの形式が正しくありません。',
            'full_name.required' => '姓名は入力必須項目です。',
            'full_name.max' => '姓名は最大100文字までです。',
            'birthday.required' => '生年月日は入力必須項目です。',
            'birthday.date' => '生年月日は有効な日付である必要があります。',
            'birthday.before' => '生年月日は今日より前の日付である必要があります。',
            'team_name.required' => '現所属チームは入力必須項目です。',
            'team_name.max' => '現所属チームは最大100文字までです。',
            'team_name.regex' => '現所属チーム名に無効な文字が含まれています。',
            'position.required' => 'ポジションは入力必須項目です。',
            'position.max' => 'ポジションは最大100文字までです。',
            'position.regex' => 'ポジション名に無効な文字が含まれています。'
        ];
    }
}
