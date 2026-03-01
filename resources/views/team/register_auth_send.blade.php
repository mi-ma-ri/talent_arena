@extends('layout')
<section class="page-title-section">
    <h1 class="page-title">{{ $title }}</h1>
</section>

<div class="container register-auth-send">
    <div class="text-center">
        <p class="email-display">{{ $email }}</p>
        <h3 class="mt-4 message">
            ご入力いただいたメールアドレスに<br>
            本登録用のURLを記載したメールを送信しました。
        </h3>
        <a class="btn btn-primary back-btn" href="/">トップページへ戻る</a>
        <ul class="notice-list">
            <li>・メール内のURLの有効期限は24時間です。期限内に本登録を完了してください。</li>
            <li>・有効期限を過ぎた場合は、お手数ですが最初からやり直してください。</li>
            <li>・しばらく経ってもメールが届かない場合は、以下をご確認ください。</li>
        </ul>
    </div>
</div>
