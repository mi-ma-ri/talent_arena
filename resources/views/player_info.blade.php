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
      @include('player_info_sidebar')
    </div>
    <div class="container background">
      <div class="row justify-content-center">
        <div class="col-md-7 info_top">
          <h1 class="mb-3 font-color">登録情報</h1>
          <div class="table-container">
            <table class="playerInfo">
              <tr>
                <th>メールアドレス</th>
                <td>{{ $player->email }}</td>
              </tr>
              <tr>
                <th>名前</th>
                <td>{{ $player->full_name }}</td>
              </tr>
              <tr>
                <th>生年月日</th>
                <td>{{ $player->birthday }}</td>
              </tr>
              <tr>
                <th>現所属チーム</th>
                <td>{{ $player->current_team }}</td>
              </tr>
              <tr>
                <th>ポジション</th>
                <td>{{ $player->position }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

