@extends('layouts.app')
@section('player_register')

<body>
    <div class="text-center h-25">
        <img src="{{ asset('/logo_header.png')}}" style="width: 250px">
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
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <input type="email" class="form-control pt-3 pb-3 mb-2 @error('email') is-invalid @enderror" id="playerEmail" name="email">

                            <label for="playerPassword" class="form-label">パスワード</label>
                            @error('password')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <input type="password" class="form-control pt-3 pb-3 mb-2 @error('password') is-invalid @enderror" id="playerPassword" name="password" placeholder="半角英数字8文字以上16桁以内">
                            <label for="sportSelect" class="form-label">競技名</label>
                            <select id="sportSelect" name="sport_id" class="form-select pt-3 pb-3 mb-2">
                                @foreach ($sports as $sport)
                                    <option value="{{ $sport->id }}">{{ $sport->sports_name }}</option>
                                @endforeach
                            </select>
                            <label for="playerFullName" class="form-label">姓名</label>
                            @error('full_name')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <input type="text" id="playerFullName" name="full_name" class="form-control pt-3 pb-3 mb-2 @error('full_name') is-invalid @enderror" placeholder="姓名を入力してください。">

                            <label for="genderSelect" class="form-label">性別</label>
                            @error('full_name')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <select id="genderSelect" name="gender" class="form-select pt-3 pb-3 mb-2 @error('full_name') is-invalid @enderror">
                                @error('gender')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                <option value="">選択してください</option>
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
                            </select>

                            <label for="playerBirth" class="form-label">生年月日</label>
                            @error('birthday')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <input type="date" id="playerBirth" name="birthday" class="form-control pt-3 pb-3 mb-2 @error('birthday') is-invalid @enderror">

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="team" class="form-label">現所属チーム・学校名</label>
                                    @error('team_name')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                    <input type="text" id="team" name="team_name" class="form-control pt-3 pb-3 mb-2 @error('team_name') is-invalid @enderror" placeholder="チーム名・学校名">
                                </div>
                                <div class="col-md-6">
                                    <label for="playerPosition" class="form-label">ポジション</label>
                                    @error('position')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                    <input type="text" id="playerPosition" name="position" class="form-control pt-3 pb-3 mb-2 @error('position') is-invalid @enderror" placeholder="※一番得意なポジションを入力">
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