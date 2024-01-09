@extends('layouts.app')

@section('lp')
<div class="container h-auto">
    <div class="login-container">
        <h1 class="login-container-word">ログイン画面</h1>
        <div class="login-container-form">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row mb-5">
                        <div class="col-md-4 offset-md-4 text-center">
                            <label for="LoginRole" class="form-label">ログインするユーザーを選んでください。</label>
                            <select id="LoginRole" name="user_type" class="form-select text-center">
                                <option value="player">選手ログイン</option>
                                <option value="teams">スカウトチームログイン</option>
                            </select>
                        </div>
                    </div>       
                    <div class="row mb-5">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>
                        <div class="col-md-4">
                            <input id="email" type="email" class="form-control form-control-lg login-form @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-5">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード') }}</label>
                        <div class="col-md-4">
                            <input id="password" type="password" class="form-control form-control-lg login-form @error('password') is-invalid @enderror" name="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="d-grid gap-2 col-2 mx-auto">
                            <button type="submit" class="btn btn-primary">
                                {{ __('ログイン') }}
                            </button>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="d-grid gap-2 col-3 mx-auto">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link d-flex mt-5 login-password" href="{{ route('password.request') }}">
                                    {{ __('パスワードをお忘れの方はこちら') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection