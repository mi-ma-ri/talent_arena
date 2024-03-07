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
    <div class="container background">
      <div class="row justify-content-center">
        <div class="col-md-7 info_top">
          <h1 class="mb-3 font-color">登録情報編集</h1>
          <p class="edit-secondary">必要に応じて登録情報を更新してください。</p>
          <form action="{{ route('player_update', ['id' => $player->id]) }}" method="POST">
            @csrf
            <fieldset>
              <div class="table-container">
                <table class="playerInfo">
                  <tr>
                    <th>メールアドレス</th>
                    @error('email')
                      <span class="error-message">{{ $message }}</span>
                    @enderror
                    <td>
                      <input type="email" class="form-control edit-common" id="playerEmail" name="email" value="{{ $player->email }}">
                    </td>
                  </tr>
                  <tr>
                    <th>姓名</th>
                    @error('full_name')
                      <span class="error-message">{{ $message }}</span>
                    @enderror
                    <td>
                      <input type="text" class="form-control edit-common" id="playerFullName" name="full_name" value="{{ $player->full_name }}">
                    </td>
                  </tr>
                  <tr>
                    <th>生年月日</th>
                    @error('birthday')
                      <span class="error-message">{{ $message }}</span>
                    @enderror
                    <td>
                      <input type="date" class="form-control edit-common" id="playerBirth" name="birthday" value="{{ $player->birthday }}">
                    </td>
                  </tr>
                  <tr>
                    <th>現所属チーム</th>
                    @error('team_name')
                      <span class="error-message">{{ $message }}</span>
                    @enderror
                    <td>
                      <input type="text" class="form-control edit-common" id="team" name="team_name" value="{{ $player->current_team }}">
                    </td>
                  </tr>
                  <tr>
                    <th>ポジション</th>
                    @error('position')
                      <span class="error-message">{{ $message }}</span>
                    @enderror
                    <td>
                      <input type="text" class="form-control edit-common" id="playerPosition" name="position" value="{{ $player->position }}">
                    </td>
                  </tr>
                </table>
                <div class="d-flex justify-content-end mt-5">
                  <button type="submit" class="edit-button">
                    {{ __('更新') }}
                  </button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

