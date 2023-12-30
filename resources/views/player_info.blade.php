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
  <div class="row vh-100">
    {{-- サイドバーの内容をインクルード --}}
    <div class="col-md-3 bg-dark">
      @include('player_info_sidebar')
    </div>
  
    {{-- その他のメインコンテンツ --}}
    <div class="col p-0">
      <nav class="navbar">
        <div class="container-fluid justify-content-center">
          <span class="navbar-text player-info-nav">
            登録情報
          </span>
        </div>
      </nav>
      <div class="container">
        <div class="row justify-content-center mt-5">
          <!-- 各行のための繰り返し開始 -->
          <div class="col-md-3 text-center">
              <ul class="list-group shadow-sm">
                <li class="list-group-item menu">項目</li>
                <li class="list-group-item">メールアドレス</li>
                <li class="list-group-item">姓名</li>
                <li class="list-group-item">性別</li>
                <li class="list-group-item">生年月日</li>
                <li class="list-group-item">現所属チーム</li>
                <li class="list-group-item">ポジション</li>
              </ul>
          </div>
          <div class="col-md-4 text-center">
            <ul class="list-group shadow-sm">
              <li class="list-group-item menu">登録内容</li>
              <li class="list-group-item">{{ $player->email }}</li>
              <li class="list-group-item">{{ $player->full_name }}</li>
              <li class="list-group-item">{{ $player->gender }}</li>
              <li class="list-group-item">{{ $player->birthday }}</li>
              <li class="list-group-item">{{ $player->current_team }}</li>
              <li class="list-group-item">{{ $player->position }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

