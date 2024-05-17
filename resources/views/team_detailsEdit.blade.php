<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- 理解できていない部分 -->
    <title>{{ config('app.', 'TalentArena') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class=" background">
    <div class="container background">
        <div class="row justify-content-center">
            <div class="col-md-8 info_top">
                <h1 class="mb-3 font-color">登録情報編集</h1>
                <p class="edit-secondary">必要に応じて登録情報を更新してください。</p>
                <form action="{{ route('teamDetailsUpdate', ['id' => $teamDetails->id]) }}" method="POST">
                    @csrf
                    <div class="table-container">
                        <table class="playerInfo">
                            <tr>
                                <th>練習場所1</th>
                                <td>
                                    @error('ground_1')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control edit-common" id="ground1"
                                        name="ground_1" value="{{ $teamDetails->ground_1 }}">
                                </td>
                            </tr>
                            <tr>
                                <th>練習場所2</th>
                                <td> <input type="text" class="form-control edit-common" id="ground2"
                                        name="ground_2" value="{{ $teamDetails->ground_2 }}">
                                </td>
                            </tr>
                            <tr>
                                <th>練習場所3</th>
                                <td> <input type="text" class="form-control edit-common" id="ground3"
                                        name="ground_3" value="{{ $teamDetails->ground_3 }}">
                                </td>
                            </tr>
                            <tr>
                                <th>部員数</th>
                                <td>
                                    @error('member')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control edit-common" id="member" name="member"
                                        value="{{ $teamDetails->members }}">
                                </td>
                            </tr>
                            <tr>
                                <th>監督名</th>
                                <td>
                                    @error('staff')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control edit-common" id="coach" name="staff"
                                        value="{{ $teamDetails->coach }}">
                                </td>
                            </tr>
                            <tr>
                                <th>週間予定</th>
                                <td>
                                    @error('schedule')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control edit-common" id="week"
                                        name="schedule" value="{{ $teamDetails->weekly_schedule }}">
                                </td>
                            </tr>
                            <tr>
                                <th>練習時間</th>
                                <td>
                                    @error('time')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control edit-common" id="tr_time" name="time"
                                        value="{{ $teamDetails->tr_time }}">
                                </td>
                            </tr>
                            <tr>
                                <th>グラウンド環境</th>
                                <td>
                                    @error('environ')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control edit-common" id="pitch" name="environ"
                                        value="{{ $teamDetails->pitch }}">
                                </td>
                            </tr>
                            <tr>
                                <th>諸経費</th>
                                <td>
                                    @error('expense')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control edit-common" id="expenses" name="expense"
                                        value="{{ $teamDetails->expenses }}">
                                </td>
                            </tr>
                            <tr>
                                <th>寮</th>
                                <td>
                                    @error('life')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control edit-common" id="dormitory" name="life"
                                        value="{{ $teamDetails->dormitory }}">
                                </td>
                            </tr>
                            <tr>
                                <th>入部条件</th>
                                <td>
                                    @error('term')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control edit-common" id="conditions"
                                        name="term" value="{{ $teamDetails->conditions }}">
                                </td>
                            </tr>
                            <tr>
                                <th>アルバイト可否</th>
                                <td>
                                    @error('part_time')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input detail-background ph" type="radio"
                                            id="Possible" name="part_time" value="1"
                                            {{ $teamDetails->is_part_time_allowed == 1 ? 'checked' : '' }} required />
                                        <label class="form-check-label" for="flexRadioDefault1">可</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input detail-background ph" type="radio"
                                            id="InPossible" name="part_time" value="0"
                                            {{ $teamDetails->is_part_time_allowed == 0 ? 'checked' : '' }} required />
                                        <label class="form-check-label" for="flexRadioDefault2">否</label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="d-flex justify-content-end mt-3 mb-5">
                            <button type="submit" class="edit-button">
                                {{ __('更新') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
