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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
            <!-- フラッシュメッセージ -->
            <script>
              @if(session('flash_message'))
                $(function () {
                  toastr.warning('{{ session('flash_message') }}');
                });
              @endif
            </script>
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
                  <th>操作</th>
                </tr>
                @foreach ($players as $player)
                  <tr class="align-middle">
                    <td >{{ $player->full_name }}</td>
                    <td>{{ $player->gender }}</td>
                    <td><a href="mailto:" class="font-color">{{ $player->email }}</a></td>
                    <td>{{ $player->statuses->statuses_name}}</td>
                    <td>{{ $player->current_team }}</td>
                    <td>{{ $player->position }}</td>
                    <td>
                      @foreach ($player->videoPosts as $videoPost)
                        <div class="pb-2 pt-2">
                          <a href="{{ route('url_point_list', ['id' => $videoPost->id]) }}" class="table-list">
                            {{ \Carbon\Carbon::parse($videoPost->post_date)->format('Y-m-d') }} <br> 投稿詳細
                          </a>
                        </div>
                      @endforeach
                    </td>
                    <td>
                      <div style="display: flex; align-items: center;">
                        <button type="button" class="user-name-btn" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $player->id }}">設定</button>
                      </div>
                      <!-- モーダルダイアログはボタンの外側に配置 -->
                      <div class="modal" tabindex="-1" id="exampleModal{{ $player->id }}">
                        <div class="modal-dialog">
                          <div class="modal-content p-modal-background">
                            <div class="modal-header">
                              <h5 class="modal-title p-modal-font">{{$player->full_name}} 選手のステータスを選択してください。</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="{{ route('team.store', ['player_id' => $player->id]) }}">
                                @csrf
                                <label class="statusSelect">
                                  <select name="status">
                                    <option value="">選択してください</option>
                                    @foreach ($statusList as $status) 
                                      @if($status->id === $player->status_id )
                                        <option value="{{ $status->id }}" selected>{{ $status->statuses_name }}</option>
                                      @else
                                        <option value="{{ $status->id }}">{{ $status->statuses_name }}</option>
                                      @endif
                                    @endforeach
                                  </select>
                                </label>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary mt-2" data-bs-dismiss="modal">キャンセル</button>
                                  <button type="submit" class="btn btn-primary mt-2">保存</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
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