<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.', 'TalentArena') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="row">
        {{-- サイドバーの内容をインクルード --}}
        <div class="col-md-3">
            @include('team_sidebar')
        </div>
        <div class="container background">
            <div class="row justify-content-center">
                <div class="col-md-7 info_top">
                    <h1 class="mb-3 font-color">登録情報</h1>
                    <div class="table-container">
                        <table class="playerInfo">
                            <tr>
                                <th>登録チーム名</th>
                                <td>{{ $team->team_name }}</td>
                            </tr>
                            <tr>
                                <th>メールアドレス</th>
                                <td>{{ $team->email }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
