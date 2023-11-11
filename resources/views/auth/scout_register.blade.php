@extends('layouts.app')
@section('scout_register')

<body>
    <div class="text-center h-25">
        <img src="logo_header.png" alt="サンプル画像" style="width:250px;">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 w-50">
                <h1 class="display-1 font-left-player">チーム<br>情報入力</h1>
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
                                    <label for="teamName" class="form-label">チーム・組織名</label>
                                    <input type="text" id="teamName" class="form-control pt-3 pb-3 mb-2" placeholder="Arenaスポーツクラブ">
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary pt-3 pb-3 w-25">作成</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection