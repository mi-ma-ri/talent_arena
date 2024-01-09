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
    {{-- その他のメインコンテンツ --}}
    <div class="col p-0">
      <nav class="navbar">
        <div class="container-fluid justify-content-center">
          <span class="navbar-text player-info-nav">
            選手から投稿された動画URL・閲覧ポイント
          </span>
        </div>
      </nav>
      <div class="container">
        <div class="row justify-content-center mt-5">
          <!-- 各行のための繰り返し開始 -->
          <div class="col-md-3 text-center">
              <ul class="list-group shadow-sm">
                <li class="list-group-item menu">項目</li>
                <li class="list-group-item">投稿日</li>
                <li class="list-group-item">投稿URL1</li>
                <li class="list-group-item">閲覧ポイント1</li>
                <li class="list-group-item">投稿URL2</li>
                <li class="list-group-item">閲覧ポイント2</li>
                <li class="list-group-item">投稿URL3</li>
                <li class="list-group-item">閲覧ポイント3</li>
              </ul>
          </div>
          <div class="col-md-5 text-center">
            <ul class="list-group shadow-sm">
              <li class="list-group-item menu">
                投稿内容
              </li>
              <li class="list-group-item">
                {{ $videoPosts->post_date }}</>
              </li>
              <li class="list-group-item">
                <a href="{{ $videoPosts->post_url_1 }}">{{ $videoPosts->post_url_1 }}</a>
              </li>
              <li class="list-group-item">
                {{ $videoPosts->check_point_1 }}</>
              </li>
              @if($videoPosts->post_url_2)
                <li class="list-group-item">
                  <a href="{{ $videoPosts->post_url_2 }}">{{ $videoPosts->post_url_2 }}</a>
                </li>
              @else
                <li class="list-group-item">投稿なし</li>
              @endif
              @if($videoPosts->check_point_2)
                <li class="list-group-item">
                  {{ $videoPosts->check_point_2 }}</>
                </li>
              @else
                <li class="list-group-item">投稿なし</li>
              @endif
              @if($videoPosts->post_url_3)
                <li class="list-group-item">
                  <a href="{{ $videoPosts->post_url_3 }}">{{ $videoPosts->post_url_3 }}</a>
                </li>
              @else
                <li class="list-group-item">投稿なし</li>
              @endif
              @if($videoPosts->check_point_3)
                <li class="list-group-item">
                  {{ $videoPosts->check_point_3 }}</>
                </li>
              @else
                <li class="list-group-item">投稿なし</li>
              @endif
            </ul>
          </div>
          <div class="mt-5 d-flex justify-content-center">
            <a href="{{ route('players_list') }}" class="btn btn-primary pt-3 pb-3 w-25">戻る</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>