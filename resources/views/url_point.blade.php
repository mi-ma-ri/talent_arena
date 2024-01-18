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
        <div class="container-fluid justify-content-center pt-3 pb-3">
          <span class="navbar-text player-info-nav">
            選手から投稿された動画URL・閲覧ポイント
          </span>
        </div>
      </nav>
      <div class="container">
        <div class="row text-center">
          <!-- 列1 -->
          <div class="modal-body">
            <ul class="list-group pt-5">
              <li class="list-group-item menu">投稿動画1</li>
              <li class="list-group-item">
                <div class="d-flex flex-row align-items-center">
                  <div class="col-md-6">
                    {{ $videoPosts->check_point_1 }}
                  </div>
                  <div class="col-md-6">
                    @if($videoPosts->thumbnail_url_1)
                      <img src="{{ $videoPosts->thumbnail_url_1 }}" alt="YouTube Thumbnail" class="img-fluid pb-5">
                      <p>
                        <a href="{{ $videoPosts->post_url_1 }}" target="_blank">{{ $videoPosts->title_1 }}</a>
                      </p>
                    @endif
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <!-- 列2 -->
          <div class="modal-body">
            <ul class="list-group">
              <!-- 投稿2の表示 -->
              <li class="list-group-item menu">投稿②</li>
              <li class="list-group-item">
                @if($videoPosts->post_url_2)
                  <div class="d-flex flex-row align-items-center">
                    <div class="col-md-6">
                      {{ $videoPosts->check_point_2 }}
                    </div>
                    <div class="col-md-6">
                      @if($videoPosts->thumbnail_url_1)
                        <img src="{{ $videoPosts->thumbnail_url_1 }}" alt="YouTube Thumbnail" class="img-fluid pb-5">
                        <p>
                          <a href="{{ $videoPosts->post_url_1 }}" target="_blank">{{ $videoPosts->title_1 }}</a>
                        </p>
                      @endif
                    </div>
                  </div>
                @else
                  <div class="text-center">投稿なし</div>
                @endif
              </li>
              <!-- 投稿3の表示 -->
              <li class="list-group-item menu">投稿③</li>
              <li class="list-group-item">
                @if($videoPosts->post_url_3)
                  <div class="d-flex flex-row align-items-center">
                    <div class="col-md-6">
                      {{ $videoPosts->check_point_3 }}
                    </div>
                    <div class="col-md-6">
                      @if($videoPosts->thumbnail_url_1)
                        <img src="{{ $videoPosts->thumbnail_url_1 }}" alt="YouTube Thumbnail" class="img-fluid pb-5">
                        <p>
                          <a href="{{ $videoPosts->post_url_1 }}" target="_blank">{{ $videoPosts->title_1 }}</a>
                        </p>
                      @endif
                    </div>
                  </div>
                @else
                  <div class="text-center">投稿なし</div>
                @endif
              </li>
            </ul>
          </div>
          <!-- 各行のための繰り返し開始 -->
          <div class="mt-5 d-flex justify-content-center">
            <a href="{{ route('players_list') }}" class="btn btn-primary pt-3 pb-3 mb-5 w-25">戻る</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>