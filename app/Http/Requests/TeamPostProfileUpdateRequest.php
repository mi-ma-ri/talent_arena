<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamPostProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'address' => ['required', 'email'],
            'website' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'teams_policy' => 'required|string|max:255',
            'schedule' => 'required|string|max:50',
            'ob_affiliation' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'address.required' => 'メールアドレスは入力必須項目です。',
            'address.email' => 'メールアドレスの形式が正しくありません。',
            'website.required' => 'ウェブサイトURLは入力必須項目です。',
            'website.max' => 'ウェブサイトURLは最大255文字までです。',
            'location.required' => '活動地域は入力必須項目です。',
            'location.max' => '活動地域は最大255文字までです。',
            'teams_policy.required' => 'チーム方針・規則は入力必須項目です。',
            'teams_policy.max' => 'チーム方針・規則は最大255文字までです。',
            'schedule.required' => 'スケジュールは入力必須項目です。',
            'schedule.max' => 'スケジュールは最大50文字までです。',
            'ob_affiliation.required' => 'OB情報は入力必須項目です。',
            'ob_affiliation.max' => 'OB情報は最大255文字までです。',
        ];
    }
}
