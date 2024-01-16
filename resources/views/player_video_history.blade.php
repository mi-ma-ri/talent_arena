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
        <div class="table-responsive mt-5 mx-5"> <!-- テーブルのレスポンシブ対応 -->
          <table class="table table-bordered table-hover">
            <thead>
              <tr class="text-center history-table">
                <th scope="col">投稿日</th>
                <th scope="col">投稿チーム</th>
                <th scope="col">投稿詳細</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($videoPosts as $videoPost)
                <tr class="text-center">
                  @if ($videoPost->post_date)
                    <td class="align-middle">{{ \Carbon\Carbon::parse($videoPost->post_date)->format('Y-m-d') }}</td>
                  @endif
                  @if ($videoPost->scoutsTeam && $videoPost->scoutsTeam->team_name)
                    <td class="align-middle">{{ $videoPost->scoutsTeam->team_name }}</td>   
                  @endif             
                  <td class="align-middle">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $videoPost->id }}">
                      動画・閲覧ポイント
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $videoPost->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $videoPost->id }}" aria-hidden="true">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">投稿詳細</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <ul class="list-group">
                              <li class="list-group-item menu">投稿①</li>
                              <li class="list-group-item">
                                <div class="d-flex flex-row align-items-center">
                                  <div class="col-md-6">
                                    {{ $videoPost->check_point_1 }}
                                  </div>
                                  <div class="col-md-6">
                                    @if($videoPost->thumbnail_url_1)
                                      <img src="{{ $videoPost->thumbnail_url_1 }}" alt="YouTube Thumbnail" class="img-fluid pb-5">
                                      <p>
                                        <a href="{{ $videoPost->post_url_1 }}" target="_blank">{{ $videoPost->title_1 }}</a>
                                      </p>
                                    @endif
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </div>                        
                          <div class="modal-body">
                            <ul class="list-group">
                              <!-- 投稿2の表示 -->
                              <li class="list-group-item menu">投稿②</li>
                              <li class="list-group-item">
                                @if($videoPost->post_url_2)
                                  <div class="d-flex flex-row align-items-center">
                                    <div class="col-md-6">
                                      {{ $videoPost->check_point_2 }}
                                    </div>
                                    <div class="col-md-6">
                                      @if($videoPost->thumbnail_url_2)
                                        <img src="{{ $videoPost->thumbnail_url_2 }}" alt="YouTube Thumbnail" class="img-fluid pb-5">
                                        <p>
                                          <a href="{{ $videoPost->post_url_2 }}" target="_blank">{{ $videoPost->title_2 }}</a>
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
                                @if($videoPost->post_url_3)
                                  <div class="d-flex flex-row align-items-center">
                                    <div class="col-md-6">
                                      {{ $videoPost->check_point_3 }}
                                    </div>
                                    <div class="col-md-6">
                                      @if($videoPost->thumbnail_url_3)
                                        <img src="{{ $videoPost->thumbnail_url_3 }}" alt="YouTube Thumbnail" class="img-fluid pb-5">
                                        <p>
                                          <a href="{{ $videoPost->post_url_3 }}" target="_blank">{{ $videoPost->title_3 }}</a>
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
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>