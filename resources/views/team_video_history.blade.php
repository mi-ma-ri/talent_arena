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
        @include('team_sidebar')
      </div>
      <div class="col p-0">
        <nav class="navbar">
          <div class="container-fluid justify-content-center">
            <span class="navbar-text player-info-nav">
              動画投稿一覧
            </span>
          </div>
        </nav>
        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th scope="col" class="p-3">姓名</th>
              <th scope="col" class="p-3">投稿日</th>
              <th scope="col" class="p-3">投稿内容</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($players as $player)
              @foreach ($player->video_posts as $video_post)
                <tr>
                  <td>{{ $player->full_name }}</td>
                  <td>{{ $video_post->post_date }}</td>
                </tr>
              @endforeach
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>