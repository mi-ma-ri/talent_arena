@extends('layouts.app')
@section('body-class', 'background')
@section('scout_register')

<body>
    <div class="text-center">
        <img src="{{ asset('/logo_header.png')}}" class="sub_header">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 w-50">
                <h1 class="display-1 font-left-player">チーム<br>情報入力</h1>
            </div>
            <div class="col-md-6 w-50">
                <form method="POST" action="{{ route('teamregister.store') }}">
                    @csrf
                    <fieldset>
                        <legend class="font-right-player">以下の必要情報を入力してください。</legend>
                        <div class="font-right-player">
                            <label for="TeamEmail" class="form-label">メールアドレス</label>
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <input type="email" class="form-control pt-3 pb-3 mb-2 @error('email') is-invalid @enderror" id="TeamEmail" name="email" placeholder="メールアドレスを入力">
                            <label for="TeamPassword" class="form-label">パスワード</label>
                            @error('password')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <input type="password" class="form-control pt-3 pb-3 mb-2 @error('password') is-invalid @enderror" id="TeamPassword" name="password" placeholder="半角英数字8文字以上16桁以内">
                            <label for="sportSelect" class="form-label">競技名</label>
                            @error('sports_id')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <select id="sportSelect" name="sports_id" class="form-select pt-3 pb-3 mb-2 @error('sports_id') is-invalid @enderror">
                                <option value="">選択してください</option>
                                @foreach ($sports as $sp)
                                    <option value="{{ $sp->id }}">{{ $sp->sports_name }}</option>
                                @endforeach
                            </select>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="teamName" class="form-label">チーム・組織名</label>
                                    @error('club_name')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                    <input type="text" id="teamName" class="form-control pt-3 pb-3 mb-2 @error('club_name') is-invalid @enderror" name="club_name" placeholder="チーム名をご入力ください。">
                                </div>
                            </div>
                            <!-- 同意チェックボックス -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="agreementCheckbox">
                                <label class="form-check-label" for="agreementCheckbox">
                                    登録情報を確認しました
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary player-regi__btn" id="submitButton" disabled>
                            送信
                        </button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection