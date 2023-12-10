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
          <div class="container-fluid justify-content-center pb-3 pt-3">
            <span class="navbar-text player-info-nav">
              投稿履歴画面
            </span>
          </div>
        </nav>
        <div class="table-responsive mt-4 mx-5 mb-3"> <!-- テーブルのレスポンシブ対応 -->
          <table class="table table-striped-columns">
            <thead>
              <tr class="text-center history-table">
                <th scope="col">投稿日</th>
                <th scope="col">投稿URL</th>
                <th scope="col">投稿詳細</th>
                <th scope="col">投稿先チーム</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($videoPost as $video)
                @if ($video->post_url_1)
                  <tr class="text-center">
                    <td>{{ \Carbon\Carbon::parse($video->post_date)->format('Y-m-d') }}</td>
                    <td><a href="{{ $video->post_url_1 }}">{{ $video->post_url_1 }}</a></td>
                    <td>{{ $video->check_point_1 }}</td>
                    <td>{{ $video->scoutsTeam->team_name }}</td>
                  </tr>
                @endif
                @if ($video->post_url_2)
                  <tr class="text-center">
                    <td>{{ \Carbon\Carbon::parse($video->post_date)->format('Y-m-d') }}</td>
                    <td><a href="{{ $video->post_url_2 }}">{{ $video->post_url_2 }}</a></td>
                    <td>{{ $video->check_point_2 }}</td>
                    <td>{{ $video->scoutsTeam->team_name }}</td>
                  </tr>
                @endif
                @if ($video->post_url_3)
                  <tr class="text-center">
                    <td>{{ \Carbon\Carbon::parse($video->post_date)->format('Y-m-d') }}</td>
                    <td><a href="{{ $video->post_url_3 }}">{{ $video->post_url_3 }}</a></td>
                    <td>{{ $video->check_point_3 }}</td>
                    <td>{{ $video->scoutsTeam->team_name }}</td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>