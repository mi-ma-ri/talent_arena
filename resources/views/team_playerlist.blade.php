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
      <div class="col-md-3">
        @include('team_sidebar')
      </div>
      <div class="container background">
        <div class="row justify-content-center">
          <div class="col-md-8 info_top">
            <h1 class="mb-3 font-color">投稿履歴</h1>
            <div class="table-container">
              <table class="table-list">
                <tr>
                    <th>姓名</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>ステータス</th>
                    <th>現所属チーム</th>
                    <th>ポジション</th>
                    <th>投稿詳細</th>
                </tr>
                @foreach ($players as $player)
                  <tr class="align-middle">
                    <td >{{ $player->full_name }}</td>
                    <td>{{ $player->gender }}</td>
                    <td><a href="mailto:" class="font-color">{{ $player->email }}</a></td>
                    <td>Mark</td>
                    <td>{{ $player->current_team }}</td>
                    <td>{{ $player->position }}</td>
                    <td>
                      @foreach ($player->videoPosts as $videoPost)
                        <div class="pb-3 pt-3">
                          <a href="{{ route('url_point_list', ['id' => $videoPost->id]) }}" class="table-list">
                            {{ \Carbon\Carbon::parse($videoPost->post_date)->format('Y-m-d') }} <br> 投稿詳細
                          </a>
                        </div>
                      @endforeach
                    </td>
                  </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>