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
            <h1 class="mb-3 font-color">投稿履歴</h1>
            <div class="table-container">
              <table class="table-list">
                <tr>
                  <th>投稿日</th>
                  <th>投稿先チーム名</th>
                  <th>投稿詳細</th>
                </tr>
                @foreach($videoPosts as $videoPost)
                  <tr>
                    <td>{{ \Carbon\Carbon::parse($videoPost->post_date)->format('Y-m-d') }}</td>
                    <td>{{ $videoPost->scoutsTeam->team_name }}</td>
                    <td>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $videoPost->id }}">
                        動画・閲覧ポイント
                      </button>
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal{{ $videoPost->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $videoPost->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content p-modal-background">
                            <div class="modal-header">
                              <h1 class="p-modal-font" id="exampleModalLabel">投稿詳細</h1>
                            </div>
                            <div class="modal-body">
                              <ul class="list-group">
                                <li class="list-group-item menu">投稿①</li>
                                  <div class="d-flex flex-row align-items-center p-modal-background">
                                    <div class="col-md-6 p-modal-font">
                                      {!! nl2br(e($videoPost->check_point_1)) !!}
                                    </div>
                                    <div class="col-md-6">
                                      @if($videoPost->thumbnail_url_1)
                                        <img src="{{ $videoPost->thumbnail_url_1 }}" alt="YouTube Thumbnail" class="img-fluid pb-5">
                                        <p>
                                          <a href="{{ $videoPost->post_url_1 }}" target="_blank" class="p-modal-link">{{ $videoPost->title_1 }}</a>
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
                                  @if($videoPost->post_url_2)
                                    <div class="d-flex flex-row align-items-center p-modal-background">
                                      <div class="col-md-6 p-modal-font">
                                        {!! nl2br(e($videoPost->check_point_2)) !!}
                                      </div>
                                      <div class="col-md-6">
                                        @if($videoPost->thumbnail_url_2)
                                          <img src="{{ $videoPost->thumbnail_url_2 }}" alt="YouTube Thumbnail" class="img-fluid pb-5">
                                          <p>
                                            <a href="{{ $videoPost->post_url_2 }}" target="_blank" class="p-modal-link">{{ $videoPost->title_2 }}</a>
                                          </p>
                                        @endif
                                      </div>
                                    </div>
                                  @else
                                    <div class="text-none">投稿なし</div>
                                  @endif
                                </li>
                                <!-- 投稿3の表示 -->
                                <li class="list-group-item menu">投稿③</li>
                                  @if($videoPost->post_url_3)
                                    <div class="d-flex flex-row align-items-center p-modal-background">
                                      <div class="col-md-6 p-modal-font">
                                        {!! nl2br(e($videoPost->check_point_3)) !!}
                                      </div>
                                      <div class="col-md-6">
                                        @if($videoPost->thumbnail_url_3)
                                          <img src="{{ $videoPost->thumbnail_url_3 }}" alt="YouTube Thumbnail" class="img-fluid pb-5">
                                          <p>
                                            <a href="{{ $videoPost->post_url_3 }}" target="_blank" class="p-modal-link">{{ $videoPost->title_3 }}</a>
                                          </p>
                                        @endif
                                      </div>
                                    </div>
                                  @else
                                    <div class="text-none">投稿なし</div>
                                  @endif
                                </li>
                              </ul>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="p-modal-btn" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      </td>
                  </tr>
                @endforeach
              </table>
            </div>
            @include('paginate', ['data' => $videoPosts])
        </div>
      </div>
    </div>
  </body>
</html>