<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Consts\CommonConsts;
use Illuminate\Validation\Rules\Password;

class PlayerPostConfirmRequest extends FormRequest
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

        $jpNameRegex = "/^[\p{Han}\p{Hiragana}\p{Katakana}ー・'’\\-\\s　々ヵヶゝゞヽヾ]+$/u";

        // カタカナ/長音「ー」/中黒「・」/カンマのみを許可
        $kanaListRegex = '/^(?=.*[ァ-ヶ])[ァ-ヶー・,]+$/u';

        return [
            'auth_key' => ['required'],
            'password' => [
                'bail',
                'required',
                'string',
                'max:16',
                Password::min(CommonConsts::PASSWORD_MIN_LENGTH)
                    ->letters()
                    ->numbers(),
            ],
            'birth_year'  => ['bail', 'integer', 'gte:0'],
            'birth_month' => ['bail', 'integer', 'between:1,12'],
            'birth_day'   => ['bail', 'integer', 'between:1,31'],
            'first_name'  => ['bail', 'required', 'string', 'max:50', "regex:$jpNameRegex"],
            'second_name' => ['bail', 'required', 'string', 'max:50', "regex:$jpNameRegex"],
            'affiliated_team' => ['bail', 'required', 'string', 'max:255'],
            'position' => ['bail', 'required', 'string', 'max:255', "regex:$kanaListRegex"],
        ];
    }

    public function attributes(): array
    {
        return [
            'password'        => 'パスワード',
            'birth_year'      => '生年',
            'birth_month'     => '月',
            'birth_day'       => '日',
            'first_name'      => '名前(姓)',
            'second_name'     => '名前(名)',
            'affiliated_team' => '所属チーム',
            'position'        => 'ポジション',
        ];
    }

    public function messages(): array
    {
        return [
            // 共通
            'required' => ':attribute は必須です。',
            'string'   => ':attribute は文字列で入力してください。',
            'max'      => ':attribute は :max 文字以内で入力してください。',
            'integer'  => ':attribute は数値で入力してください。',
            'gte'      => ':attribute は :value 以上で指定してください。',
            'regex'    => ':attribute の形式が正しくありません。',

            // パスワード系（Password ルールのカスタムキー）
            'password.min'     => 'パスワードは :min 文字以上で設定してください。',
            'password.letters' => 'パスワードは英字を含めてください。',
            'password.numbers' => 'パスワードは数字を含めてください。',

            // フィールド固有に言い換えたい場合だけ個別定義（任意）
            'position.regex' => 'ポジションはカタカナ、長音「ー」、中黒「・」、カンマのみで入力してください。',
            'birth_year.between' => '生年月日は正しい年を選択してください。',
            'birth_month.between' => '生年月日は正しい月を選択してください。',
            'birth_day.between'   => '生年月日は正しい日を選択してください。',
        ];
    }
}
