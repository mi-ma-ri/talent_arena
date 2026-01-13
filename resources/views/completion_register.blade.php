<div class="completion">
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="justify-content-center text-center mb-5">
            <img src="logo_header.png" alt="サンプル画像" class="completion-logo">
            <h1 class="display-5 text-light mb-5">あなたの情報が正常に保存されました。</h1>
        </div>
        @if (Route::has('login'))
            <a class="btn btn-primary mt-5 p-3" href="{{ route('login') }}">{{ __('ログイン画面へ') }}</a>
        @endif
    </div>
</div>
