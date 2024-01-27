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
  <div class="header">
    <label for="openSidebarMenu" class="sidebarIconToggle">
      <div class="spinner diagonal part-1"></div>
      <div class="spinner horizontal"></div>
      <div class="spinner diagonal part-2"></div>
    </label>
    <span class="system-name">TalentArena</span>
    <div class="user-name">
      <a href="{{ route('player_register_info')}}" class="user-name-btn">
        登録情報に戻る
      </a>
    </div>
  </div>
  <input type="checkbox" class="openSidebarMenu toggle-checkbox" id="openSidebarMenu">
  <div id="sidebarMenu">
    <ul class="sidebarMenuInner">
      <li><a href="/player/video">動画投稿</a></li>
      <li><a href="/player/video-history">投稿履歴</a></li>
      <li>
        <a href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();">ログアウト</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
          @csrf
        </form>
      </li>
    </ul>
  </div>
</body>
</html>

