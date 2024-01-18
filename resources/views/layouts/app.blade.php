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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,100&display=swap" rel="stylesheet">

  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
  <div id="app">
    <header class="navbar">
      <div class="container-fluid">
        <a href="{{ url('/') }}" class="navbar-brand header-title">
          <h1>TalentArena</h1>
        </a>
        <div class="d-flex flex-wrap align-items-center justify-content-between">
          <div class="text-end">
            <!-- Authentication Links -->
            @guest
              @if (Route::has('login'))
                <a class="btn header-login" href="{{ route('login') }}">{{ __('ログイン') }}</a>
              @endif
              @if (Route::has('choose_register'))
                <a class="btn header-signup" href="{{ route('choose_register') }}">{{ __('新規登録') }}</a>
              @endif
            @endguest
          </div>
        </div>
      </div>
    </header>
  </div>
  
  <main class="py-0">
    @yield('top')
    @yield('login')
    @yield('choose_register')
    @yield('player_register')
    @yield('scout_register')
  </main>
</body>
</html>