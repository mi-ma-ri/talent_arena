@extends('layout')
{{-- <div class="text-center h-25">
    <img src="{{ asset('/logo_header.png') }}" class="sub_header">
</div> --}}
<div class="container">
    <div class="row">
        <div class="col-md-6 w-50">
            <h1 class="display-4 font-left-player">{{ $title }}</h1>
        </div>
        <div class="col-md-6 w-50">
            <form action="/player/email_auth" method="POST">
                @csrf
                <fieldset>
                    <legend class="font-right-player">メールアドレスで会員登録する</legend>
                    <div class="font-right-player">
                        <label for="playerEmail" class="form-label">メールアドレス</label>
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                        <input type="email" class="form-control pt-3 pb-3 mb-2 @error('email') is-invalid @enderror"
                            id="playerEmail" name="email" placeholder="メールアドレスを入力してください">
                        <input type="hidden" name="user_status" value="0">
                        <input type="hidden" name="user_type" value="0">
                        <button type="submit" class="btn btn-primary player-regi__btn">
                            送信
                        </button>
                </fieldset>
                <p>※ 上記で入力したメールアドレス宛に届く「仮登録」メールを開き、本登録のお手続が必要です。</p>
            </form>
        </div>
    </div>
</div>
