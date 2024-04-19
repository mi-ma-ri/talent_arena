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

<body class="background">
    <div class="container mt-5">
        <div class="row justify-content-center background">
            <div class="col-md-6 mt-5">
                {{-- <form method="POST" action="{{ route('teamDetails.store') }}"> --}}
                <form method="POST" action="/team/hoge">
                    @csrf
                    <h1 class="text-center mb-3 text-white">部活動/チーム紹介</h1>
                    <div id="form-container">
                        <div class="detail-main">
                            <div class="form-group">
                                <label for="tr-ground" class="form-label fs-5">- 練習場所 -</label>
                                <input type="text" class="form-control mb-3 p-3 detail-background ph" name="ground1"
                                    placeholder="最大3つの練習場所掲載が可能">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary" id="add-form">+ 入力フォームを追加する</button>
                        </div>
                        <div class="detail-main mt-3">
                            <div class="form-group">
                                <label for="members" class="form-label fs-5">- チーム人数 -</label>
                                <input type="text" class="form-control mb-3 p-3 detail-background ph" name="member"
                                    placeholder="例:4年生:10名 3年生:10名 2年生:10名 1年生:15名">
                            </div>
                        </div>
                        <div class="detail-main mt-3">
                            <div class="form-group">
                                <label for="coach" class="form-label fs-5">- 監督 -</label>
                                <input type="text" class="form-control mb-3 p-3 detail-background ph" name="staff"
                                    placeholder="例:タレント・アリーナ">
                            </div>
                        </div>
                        <div class="detail-main mt-3">
                            <div class="form-group">
                                <label for="weekly-schedule" class="form-label fs-5">- 週間予定 -</label>
                                <input type="text" class="form-control mb-3 p-3 detail-background ph" name="schedule"
                                    placeholder="例:月:OFF 火水木金:練習 土日:公式戦or練習試合">
                            </div>
                        </div>
                        <div class="detail-main mt-3">
                            <div class="form-group">
                                <label for="time" class="form-label fs-5">- 練習時間 -</label>
                                <input type="text" class="form-control mb-3 p-3 detail-background ph" name="time"
                                    placeholder="例:AM6:00-8:00 or PM19:00-21:00">
                            </div>
                            <div class="form-group">
                                <label for="pitch" class="form-label fs-5">- グラウンド環境 -</label>
                                <input type="text" class="form-control mb-3 p-3 detail-background ph" name="environ"
                                    placeholder="人工芝グラウンド、天然芝(水曜日のみ)">
                            </div>
                            <div class="form-group">
                                <label for="expense" class="form-label fs-5">- 諸経費 -</label>
                                <input type="text" class="form-control mb-3 p-3 detail-background ph" name="expense"
                                    placeholder="部費,寮費その他について">
                            </div>
                            <div class="form-group">
                                <label for="dormitory" class="form-label fs-5">- 寮 -</label>
                                <input type="text" class="form-control mb-3 p-3 detail-background ph" name="life"
                                    placeholder="例:1,2年時は寮生活必須 3,4年時は自由">
                            </div>
                            <div class="form-group">
                                <label for="conditions" class="form-label fs-5">- 入部条件 -</label>
                                <input type="text" class="form-control mb-3 p-3 detail-background ph" name="term"
                                    placeholder="例:スポーツ推薦入学(指定校・AOで入学した学生は練習会参加後判断)">
                            </div>
                            <div class="form-group">
                                <p class="control-label fs-5 mb-0">- アルバイトの可否 -</p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input  detail-background ph" type="radio" id="Possible"
                                        name="part_time" value="1" />
                                    <label class="form-check-label" for="flexRadioDefault1">可</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input detail-background ph" type="radio"
                                        id="InPossible" name="part_time" value="0" />
                                    <label class="form-check-label" for="flexRadioDefault2">否</label>
                                </div>
                            </div>
                            <div class="mt-4 mb-4 d-flex justify-content-center">
                                <input type="submit" class="btn btn-primary pt-3 pb-3 w-25" value="投稿">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
