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
              選手一覧リスト
            </span>
          </div>
        </nav>
        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th scope="col" class="p-3">姓名</th>
              <th scope="col" class="p-3">性別</th>
              <th scope="col" class="p-3">メールアドレス</th>
              <th scope="col" class="p-3">ステータス</th>
              <th scope="col" class="p-3">現所属チーム</th>
              <th scope="col" class="p-3">ポジション</th>
              <th scope="col" class="p-3">投稿内容</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($players as $player)
              <tr class="align-middle">
                <td >{{ $player->full_name }}</td>
                <td>{{ $player->gender }}</td>
                <td>{{ $player->email }}</td>
                <td>Mark</td>
                <td>{{ $player->current_team }}</td>
                <td>{{ $player->position }}</td>
                <td>
                  @foreach ($player->videoPosts as $videoPost)
                    <div class="pb-3 pt-3">
                      <a href="{{ route('url_point_list', ['id' => $videoPost->id]) }}">投稿詳細</a>
                    </div>
                  @endforeach
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>