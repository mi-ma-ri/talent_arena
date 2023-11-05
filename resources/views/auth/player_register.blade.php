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
                <form>
                    <fieldset>
                        <legend class="font-right-player">以下の必要情報を入力してください。</legend>
                        <div class="font-right-player">
                            <label for="InputEmail1" class="form-label">メールアドレス</label>
                            <input type="email" class="form-control pt-3 pb-3 mb-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="メールアドレスを入力">
                            <label for="exampleInputPassword1" class="form-label">パスワード</label>
                            <input type="password" class="form-control pt-3 pb-3 mb-2" id="exampleInputPassword1" placeholder="半角英数字8文字以上16桁以内">
                            <label for="sportSelect" class="form-label">競技名</label>
                            <select id="sportSelect" class="form-select pt-3 pb-3 mb-2">
                                <option value="soccer">サッカー</option>
                                <option value="baseball">野球</option>
                                <option value="basketball">バスケットボール</option>
                            </select>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="firstNameInput" class="form-label">姓</label>
                                    <input type="text" id="firstNameInput" class="form-control pt-3 pb-3 mb-2" placeholder="姓">
                                </div>
                                <div class="col-md-6">
                                    <label for="lastNameInput" class="form-label">名</label>
                                    <input type="text" id="lastNameInput" class="form-control pt-3 pb-3 mb-2" placeholder="名">
                                </div>
                            </div>
                            <label for="genderSelect" class="form-label">性別</label>
                            <select id="genderelect" class="form-select pt-3 pb-3 mb-2">
                                <option value="male">男性</option>
                                <option value="female">女性</option>
                            </select>
                            <label for="birth" class="form-label">生年月日</label>
                            <input type="date" id="birth" class="form-control pt-3 pb-3 mb-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="teamName" class="form-label">現所属チーム・学校名</label>
                                    <input type="text" id="teamName" class="form-control pt-3 pb-3 mb-2" placeholder="チーム名・学校名">
                                </div>
                                <div class="col-md-6">
                                    <label for="position" class="form-label">ポジション</label>
                                    <input type="text" id="position" class="form-control pt-3 pb-3 mb-2" placeholder="※一番得意なポジションを入力">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary pt-3 pb-3 w-25">作成</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

</body>
@endsection