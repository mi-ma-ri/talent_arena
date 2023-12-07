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
    <div class="col p-0">
      <nav class="navbar">
        <div class="container-fluid justify-content-center pb-3 pt-3">
          <span class="navbar-text player-info-nav">
            動画投稿画面
          </span>
        </div>
      </nav>
      <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
          <form method="POST" action="{{ route('player.store') }}">
            @csrf
            <div class="row">
              <div class="col-md-6 mb-2 mt-2">
                <label for="post_day" class="form-label">投稿日</label>
                <input type="date" class="form-control" id="post_day" name="day" placeholder="">
              </div>
              <div class="col-md-6 mb-2 mt-2">
                <label for="team" class="form-label">投稿先チーム</label>
                <select id="team" name="team_id" class="form-select">
                    @foreach ($scouts_team as $team)
                      <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <fieldset class="fieldset-border">
              <legend>投稿詳細1</legend>
              <div class="row">
                <div class="col-md-8 mb-3 mt-2">
                  <label for="post_url1" class="form-label">投稿URL1</label>
                  <input type="url" class="form-control" id="post_url1" name="url1" placeholder="投稿する動画URLを入力">
                </div>
              </div>
              <div class="mb-3 mt-2">
                <label for="textarea1" class="form-label">注目してほしいポイント ※背番号の入力は必須でお願いします。</label>
                <textarea class="form-control video-post-texare" id="textarea1" name="point1" rows="7"></textarea>
              </div>
            </fieldset>
            <fieldset class="fieldset-border">
              <legend>投稿詳細2</legend>
              <div class="row">
                <div class="col-md-8 mb-3 mt-2">
                  <label for="post_url2" class="form-label">投稿URL2</label>
                  <input type="url" class="form-control" id="post_url2" name="url2" placeholder="投稿する動画URLを入力">
                </div>
              </div>
              <div class="mb-3 mt-2">
                <label for="textarea2" class="form-label">注目してほしいポイント ※背番号の入力は必須でお願いします。</label>
                <textarea class="form-control video-post-texare" id="textarea2" name="point2" rows="7"></textarea>
              </div>
            </fieldset>
            <fieldset class="fieldset-border">
              <legend>投稿詳細3</legend>
              <div class="row">
                <div class="col-md-8 mb-3 mt-2">
                  <label for="post_url3" class="form-label">投稿URL3</label>
                  <input type="url" class="form-control" id="post_url3" name="url3" placeholder="投稿する動画URLを入力">
                </div>
              </div>
              <div class="mb-5 mt-2">
                <label for="textarea3" class="form-label">注目してほしいポイント ※背番号の入力は必須でお願いします。</label>
                <textarea class="form-control video-post-texare" id="textarea3" name="point3" rows="7"></textarea>
              </div>
            </fieldset>
            <div class="mt-4 mb-4 d-flex justify-content-center">
              <input type="submit"  class="btn btn-primary pt-3 pb-3 w-25" value="投稿">
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>
</body>
</html>
  </div>
</body>