@extends('layout')
@section('content')
    <section class="page-title-section">
        <h1 class="page-title">{{ $title }}</h1>
    </section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 text-center">
                <div class="description">
                    <p>メールアドレスをご入力の上、送信ボタンを押してください。</p>
                    <p>入力したメールアドレス宛に仮登録メールが届きます。</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt40">
            <div class="col-md-6">
                <form action="{{ route('team.post.email_auth') }}" method="POST" class="d-inline-block">
                    @csrf
                    <fieldset>
                        <div class="mt50">
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <input type="email" class="form-control pt-3 pb-3 mb-2 @error('email') is-invalid @enderror"
                                id="playerEmail" name="email" placeholder="メールアドレスを入力してください">
                            <input type="hidden" name="status" value="0">
                            <input type="hidden" name="subject_type" value="0">
                            <div class="d-flex flex-row justify-content-center gap-4">
                                <button type="submit" class="btn btn-primary make_btn">
                                    送信
                                </button>
                                <a class="btn btn-primary make_btn" href="/">戻る</a>
                            </div>
                        </div>
                    </fieldset>
                    <p>※ 上記で入力したメールアドレス宛に届く「仮登録」メールを開き、本登録のお手続が必要です。</p>
                </form>
            </div>
        </div>
    </div>
@endsection
