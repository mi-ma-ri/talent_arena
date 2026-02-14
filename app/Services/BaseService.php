<?php

namespace App\Services;

use App\Consts\CommonConsts;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\SentMessage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;
use Throwable;

class BaseService
{
  /**
   * GuzzleでAPIを叩く
   *
   * @param string $url
   * @param string $method
   * @param array $parameter
   * @return array
   */
  public function api(string $url, string $method = "get", array $parameter = [], array $headers = [], $form = false): array
  {
    if (app()->environment('local')) {
      $response = Http::withOptions(['verify' => false])->withHeaders($headers)->$method($url, $parameter);
    } else if ($form) {
      $response = Http::withHeaders($headers)->asForm()->$method($url, $parameter);
    } else {
      $response = Http::withHeaders($headers)->$method($url, $parameter);
    }

    return [
      'status' => $response->status(),
      'header' => $response->headers(),
      'body' => $response->json(),
    ];
  }

  /**
   * TalentArena API呼び出し
   *
   * @param string $url
   * @param string $method
   * @param array $parameter
   * @return array
   */
  public function talentArenaApi(string $url, string $method = 'get', array $parameter = []): array
  {
    $url = substr($url, 0, 1) == "/" ? substr($url, 1) : $url;

    // 認証トークンをヘッダーに付与
    $headers = [];
    $token = session('token');
    if ($token) {
      $headers['Authorization'] = 'Bearer ' . $token;
    }

    return $this->api(config("app.talent_arena_api_url") . "/{$url}", $method, $parameter, $headers);
  }

  /**
   * email送信
   *
   * @param string $subject [ タイトル ]
   * @param string $text [ 本文 ] blade名を指定
   * @param string $to_email_address [ 送信先メールアドレス ]
   * @param array $request_params [ blade内で使用する値 ]
   * @param string $name [ 送信元差出人名 ]
   * @param string|null $cc [ CC ]
   * @param string|null $bcc [ BCC ]
   * @return SentMessage
   */
  public function sendEmail(string $subject, string $text, string $to_email_address, array $request_params, string $name = '', string $cc = null, string $bcc = null): SentMessage
  {
    try {
      $mail_params = [
        'subject' => $subject,
        'from' => config('mail.from.address'),
        'from_name' => $name === '' ? config('mail.from.name') : $name,
        'params' => $request_params,
        'to' => $to_email_address,
        'cc' => $cc,
        'bcc' => $bcc,
        'text' => $text,
      ];

      $send_mail = Mail::to($mail_params['to'])->send(new SendMail($mail_params));

      Log::info('メールの送信に成功しました。');
      return $send_mail;
    } catch (Throwable $e) {
      Log::error($e);
      throw new Exception('メールの送信に失敗しました');
    }
  }

  // /**
  //  * パラメータの文字列+SALTでハッシュ化します
  //  * @param string
  //  * @return string
  //  */
  // public function hashByCommonSalt(string $str): string
  // {
  //   return hash("SHA256", $str . CommonConsts::COMMON_SALT);
  // }
}
