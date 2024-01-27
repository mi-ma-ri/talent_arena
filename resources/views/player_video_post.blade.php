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
    {{-- サイドバーの内容をインクルード --}}
    <div class="col-md-3">
      @include('player_info_sidebar')
    </div>
    <div class="container mt-5">
      <div class="row justify-content-center background">
        <div class="col-md-4 mt-5">
          <form method="POST" action="{{ route('player.store') }}">
            @csrf
            <div class="row p-post-text">
              <h1 class="text-center mb-3">動画URL投稿</h1>
              <div class="col-md-6 mb-2 mt-2">
                <label for="post_day" class="form-label">投稿日</label>
                @error('day')
                  <span class="error-message">{{ $message }}</span>
                @enderror
                <input type="date" class="form-control p-post-padding @error('day') is-invalid @enderror" id="post_day" name="day">
              </div>
              <div class="col-md-6 mb-2 mt-2">
                <label for="team" class="form-label @error('team_id') is-invalid @enderror">投稿先チーム</label>
                  @error('team_id')
                    <span class="error-message">{{ $message }}</span>
                  @enderror
                <select id="team" name="team_id" class="form-select p-post-padding">
                  <option value="">選択してください</option>
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
                  @error('url1')
                    <span class="error-message">{{ $message }}</span>
                  @enderror
                  <input type="url" class="form-control @error('url1') is-invalid @enderror" id="post_url1" name="url1" value="{{ old('url1') }}" placeholder="投稿する動画URLを入力">
                </div>
              </div>
              <div class="mb-3 mt-2">
                <label for="textarea1" class="form-label">注目してほしいポイント ※背番号の入力は必須でお願いします。</label>
                @error('point1')
                  <span class="error-message">{{ $message }}</span>
                @enderror
                <textarea class="form-control video-post-texare @error('point1') is-invalid @enderror" id="textarea1" name="point1" rows="7">{{ old('point1') }}</textarea>
              </div>
            </fieldset>
            <fieldset class="fieldset-border">
              <legend>投稿詳細2</legend>
              <div class="row">
                <div class="col-md-8 mb-3 mt-2">
                  <label for="post_url2" class="form-label">投稿URL2</label>
                  @error('url2')
                    <span class="error-message">{{ $message }}</span>
                  @enderror
                  <input type="url" class="form-control" id="post_url2" name="url2" value="{{ old('url2') }}" placeholder="投稿する動画URLを入力">
                </div>
              </div>
              <div class="mb-3 mt-2">
                <label for="textarea2" class="form-label">注目してほしいポイント ※背番号の入力は必須でお願いします。</label>
                @error('point2')
                  <span class="error-message">{{ $message }}</span>
                @enderror
                <textarea class="form-control video-post-texare @error('point2') is-invalid @enderror" id="textarea2" name="point2" rows="7">{{ old('point2') }}</textarea>
              </div>
            </fieldset>
            <fieldset class="fieldset-border">
              <legend>投稿詳細3</legend>
              <div class="row">
                <div class="col-md-8 mb-3 mt-2">
                  <label for="post_url3" class="form-label">投稿URL3</label>
                    @error('url3')
                      <span class="error-message">{{ $message }}</span>
                    @enderror
                  <input type="url" class="form-control @error('url3') is-invalid @enderror" id="post_url3" name="url3" value="{{ old('url3') }}" placeholder="投稿する動画URLを入力">
                </div>
              </div>
              <div class="mb-5 mt-2">
                <label for="textarea3" class="form-label">注目してほしいポイント ※背番号の入力は必須でお願いします。</label>
                @error('point3')
                  <span class="error-message">{{ $message }}</span>
                @enderror
                <textarea class="form-control video-post-texare @error('point3') is-invalid @enderror" id="textarea3" name="point3" rows="7">{{ old('point3') }}</textarea>
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