@extends('layouts.app')
@section('player_register')

<body>
    <div class="text-center h-25">
        <img src="logo_header.png" alt="サンプル画像" style="width:250px;">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 w-50">
                <h1 class="display-1 font-left-player">ユーザー<br>情報入力</h1>
            </div>
            <div class="col-md-6 w-50">
                <form method="POST" action="{{ route('register.store') }}">
                    @csrf
                    <fieldset>
                        <legend class="font-right-player">以下の必要情報を入力してください。</legend>
                        <div class="font-right-player">
                            <label for="playerEmail" class="form-label">メールアドレス</label>
                            <input type="email" class="form-control pt-3 pb-3 mb-2" id="playerEmail" name="address" placeholder="メールアドレスを入力">
                            <label for="playerPassword" class="form-label">パスワード</label>
                            <input type="password" class="form-control pt-3 pb-3 mb-2" id="playerPassword" name="password" placeholder="半角英数字8文字以上16桁以内">
                            <label for="sportSelect" class="form-label">競技名</label>
                            <select id="sportSelect" name="sport_id" class="form-select pt-3 pb-3 mb-2">
                                @foreach ($sports as $sport)
                                    <option value="{{ $sport->id }}">{{ $sport->sport_name }}</option>
                                @endforeach
                            </select>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="playerFirstName" class="form-label">姓</label>
                                    <input type="text" id="playerFirstName" name="firstName" class="form-control pt-3 pb-3 mb-2" placeholder="姓">
                                </div>
                                <div class="col-md-6">
                                    <label for="playerLastName" class="form-label">名</label>
                                    <input type="text" id="playerLastName" name="lastName" class="form-control pt-3 pb-3 mb-2" placeholder="名">
                                </div>
                            </div>
                            <label for="genderSelect" class="form-label">性別</label>
                            <select id="genderSelect" name="gender" class="form-select pt-3 pb-3 mb-2">
                                <option value="">選択してください</option>
                                <option value="1">男性</option>
                                <option value="2">女性</option>
                            </select>
                            <label for="playerBirth" class="form-label">生年月日</label>
                            <input type="date" id="playerBirth" name="birthday" class="form-control pt-3 pb-3 mb-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="team" class="form-label">現所属チーム・学校名</label>
                                    <input type="text" id="team" name="team_name" class="form-control pt-3 pb-3 mb-2" placeholder="チーム名・学校名">
                                </div>
                                <div class="col-md-6">
                                    <label for="playerPosition" class="form-label">ポジション</label>
                                    <input type="text" id="playerPosition" name="position" class="form-control pt-3 pb-3 mb-2" placeholder="※一番得意なポジションを入力">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <input type="submit"  class="btn btn-primary pt-3 pb-3 w-25" value="作成">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection