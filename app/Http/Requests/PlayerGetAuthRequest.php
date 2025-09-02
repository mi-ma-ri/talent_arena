<?php

namespace App\Http\Requests;

use App\Services\PlayerService;
use Closure;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;


class PlayerGetAuthRequest extends FormRequest
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
            'key' => [
                'bail', 
                'required', 
                function (string $attribute, mixed $value, Closure $fail) {
                    $player_service = new PlayerService;
                    $response = $player_service->talentArenaApi('register/existKey', 'get', [
                        'key' => $value,
                        'table' => 'auth_keys',
                    ]);
                    if($response['status'] !== 200 || empty($response['body']) || $response['body']['result_message'] != 'OK') {
                        Log::error('playerEmailAuthError 正しい認証キーではありません。');
                        $fail('有効な認証キーではありません。');
                    }
                }
            ]
        ];
    }
}
