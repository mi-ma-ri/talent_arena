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
    <div class="col-md-3">
      @include('team_sidebar')
    </div>
    {{-- その他のメインコンテンツ --}}
    <div class="container background">
      <div class="row justify-content-center">
        <div class="col-md-7 info_top">
          <h1 class="mb-3 font-color">投稿履歴</h1>
          <div class="row text-center">
            <!-- 列1 -->
            <div class="modal-body">
              <ul class="list-group">
                <li class="list-group-item menu">投稿①</li>
                  <div class="d-flex flex-row align-items-center p-modal-background p-4">
                    <div class="col-md-6 p-modal-font">
                      {!! nl2br(e($videoPosts->check_point_1)) !!}
                    </div>
                    <div class="col-md-6">
                      @if($videoPosts->thumbnail_url_1)
                        <img src="{{ $videoPosts->thumbnail_url_1 }}" alt="YouTube Thumbnail" class="img-fluid pb-5">
                        <p>
                          <a href="{{ $videoPosts->post_url_1 }}" target="_blank" class="p-modal-link">{{ $videoPosts->title_1 }}</a>
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
                <li class="list-group-item menu mt-4">投稿②</li>
                  @if($videoPosts->post_url_2)
                    <div class="d-flex flex-row align-items-center p-modal-background">
                      <div class="col-md-6 p-modal-font">
                        {!! nl2br(e($videoPosts->check_point_2)) !!}
                      </div>
                      <div class="col-md-6 pt-4">
                        @if($videoPosts->thumbnail_url_2)
                          <img src="{{ $videoPosts->thumbnail_url_2 }}" alt="YouTube Thumbnail" class="img-fluid pb-5">
                          <p>
                            <a href="{{ $videoPosts->post_url_2 }}" target="_blank" class="p-modal-link">{{ $videoPosts->title_2 }}</a>
                          </p>
                        @endif
                      </div>
                    </div>
                  @else
                    <div class="text-none__team">投稿なし</div>
                  @endif
                </li>
                <!-- 投稿3の表示 -->
                <li class="list-group-item menu">投稿③</li>
                  @if($videoPosts->post_url_3)
                    <div class="d-flex flex-row align-items-center p-modal-background">
                      <div class="col-md-6 p-modal-font">
                        {!! nl2br(e($videoPosts->check_point_3)) !!}
                      </div>
                      <div class="col-md-6 pt-4">
                        @if($videoPosts->thumbnail_url_3)
                          <img src="{{ $videoPosts->thumbnail_url_3 }}" alt="YouTube Thumbnail" class="img-fluid pb-5">
                          <p>
                            <a href="{{ $videoPosts->post_url_3 }}" target="_blank" class="p-modal-link">{{ $videoPosts->title_3 }}</a>
                          </p>
                        @endif
                      </div>
                    </div>
                  @else
                    <div class="text-none__team">投稿なし</div>
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
  </div>
</body>
</html>