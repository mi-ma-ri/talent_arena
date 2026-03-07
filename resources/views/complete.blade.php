<body>
    @extends('layout')
    @section('content')
        <section class="page-title-section">
            <h1 class="page-title">ユーザー登録完了</h1>
        </section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 text-center">
                    <div class="description">
                        <p>ユーザー登録が完了しました。</p>
                        <p>本登録完了メールを​送信しました。​ログイン画面への遷移をお願いいたします。</p>
                    </div>
                    @if (session('subject_type') === App\Consts\CommonConsts::SUBJECT_TYPE_TEAMS)
                        <a class="btn btn-primary mt-5 p-3" href="{{ route('login.get.team.attempt') }}">ログイン画面へ</a>
                    @else
                        <a class="btn btn-primary mt-5 p-3" href="{{ route('login.get.attempt') }}">ログイン画面へ</a>
                    @endif
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
