<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- 理解できていない部分 -->
        <title>{{ config('app.', 'TalentArena') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>

    <body>
        <div class="completion">
            <div class="container d-flex flex-column justify-content-center align-items-center">
                <div class="justify-content-center text-center mb-5">
                    <img src="logo_header.png" alt="サンプル画像" class="completion-logo">
                    <h1 class="display-5 text-light mb-5">あなたの情報が正常に保存されました。</h1>
                </div>
                @if (Route::has('login'))
                    <a class="btn btn-primary mt-5 p-3" href="{{ route('player_video_history') }}">{{ __('投稿履歴画面へ') }}</a>
                @endif
            </div>
        </div>
    </body>    
</html>