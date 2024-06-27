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
                                <th>学校・チーム名</th>
                                <th>詳細情報</th>
                            </tr>
                            @foreach ($teamDetails as $team)
                                <tr>
                                    <td>{{ $team->team_name }}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $team->id }}">
                                            チーム紹介一覧
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $team->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel{{ $team->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-fullscreen">
                                                <div class="modal-content background">
                                                    <div class="modal-header">
                                                        <h1 id="exampleModalLabel">投稿詳細</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table-container">
                                                            <table class="table-list justify-content-center">
                                                                <tr>
                                                                    <td>グラウンド情報(活動が多い順)</td>
                                                                    <td>①{{ $team->teamDetail->ground_1 }}</td>
                                                                    @if ($team->teamDetail->ground_2)
                                                                        <td>②{{ $team->teamDetail->ground_2 }}</td>
                                                                    @endif
                                                                    @if ($team->teamDetail->ground_3)
                                                                        <td>③{{ $team->teamDetail->ground_3 }}</td>
                                                                    @endif

                                                                </tr>
                                                                <tr>
                                                                    <td>メンバー数</td>
                                                                    <td>{{ $team->teamDetail->members }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>監督名</td>
                                                                    <td>{{ $team->teamDetail->coach }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>週間スケジュール(流れ)</td>
                                                                    <td>{{ $team->teamDetail->weekly_schedule }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>練習時間予定</td>
                                                                    <td>{{ $team->teamDetail->tr_time }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>グラウンド環境</td>
                                                                    <td>{{ $team->teamDetail->pitch }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>諸経費</td>
                                                                    <td>{{ $team->teamDetail->expenses }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>寮</td>
                                                                    <td>{{ $team->teamDetail->dormitory }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>入部条件</td>
                                                                    <td>{{ $team->teamDetail->conditions }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>アルバイト可否</td>
                                                                    <td>
                                                                        @if ($team->teamDetail->is_part_time_allowed == 1)
                                                                            可能
                                                                        @else
                                                                            不可
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="p-modal-btn"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    @include('paginate', ['data' => $teamDetails])
                </div>
            </div>
        </div>
</body>

</html>
