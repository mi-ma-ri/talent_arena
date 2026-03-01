@extends('layout')
@section('content')
    <section class="page-title-section">
        <h1 class="page-title">{{ $title }}</h1>
    </section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 text-center">
                <div class="description">
                    <p>下記に沿ってチーム情報をご入力ください。</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb40">
            <div class="col-md-7">
                <form action="{{ route('team.post.confirm') }}" method="POST" class="w-100">
                    @csrf
                    <fieldset>
                        <div class="mt50">
                            {{-- メールアドレス --}}
                            <label for="email" class="form-label">ご登録メールアドレス</label>
                            <p class="ft15">{{ $email }}</p>
                            {{-- チーム名 --}}
                            <div class="mb-4">
                                <label for="teams_name" class="form-label">チーム名</label>
                                @error('teams_name')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                <input type="text"
                                    class="form-control pt-3 pb-3 @error('teams_name') is-invalid @enderror" id="teams_name"
                                    name="teams_name" value="{{ old('teams_name') }}" placeholder="チーム名を入力してください">
                            </div>

                            {{-- 活動地域 --}}
                            <div class="mb-4">
                                <label for="location" class="form-label">活動場所</label>
                                @error('location')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                <input type="text" class="form-control pt-3 pb-3 @error('location') is-invalid @enderror"
                                    id="location" name="location" value="{{ old('location') }}" placeholder="例: 東京都渋谷区">
                            </div>

                            {{-- 公式サイトURL --}}
                            <div class="mb-4">
                                <label for="website" class="form-label">公式サイトURL</label>
                                @error('website')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                <input type="text" class="form-control pt-3 pb-3 @error('website') is-invalid @enderror"
                                    id="website" name="website" value="{{ old('website') }}" placeholder="https:://....">
                            </div>

                            {{-- チーム方針・理念 --}}
                            <div class="mb-4">
                                <label for="teams_policy" class="form-label">チーム方針・理念・規則</label>
                                @error('teams_policy')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                <textarea class="form-control @error('teams_policy') is-invalid @enderror" id="teams_policy" name="teams_policy"
                                    rows="4" placeholder="規則については、バイト可・全寮制など">{{ old('teams_policy') }}</textarea>
                            </div>

                            {{-- スケジュール --}}
                            <div class="mb-4">
                                <label for="schedule" class="form-label">スケジュール</label>
                                @error('schedule')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                <textarea class="form-control @error('schedule') is-invalid @enderror" id="schedule" name="schedule" rows="4"
                                    placeholder="規則については、バイト可・全寮制など">{{ old('schedule') }}</textarea>
                            </div>

                            {{-- OB情報 --}}
                            <div class="mb-4">
                                <label for="ob_affiliation" class="form-label">OBの主な進路先</label>
                                @error('ob_affiliation')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                <textarea class="form-control @error('ob_affiliation') is-invalid @enderror" id="ob_affiliation" name="ob_affiliation"
                                    rows="4" placeholder="OBの主な進路先(サッカー/一般企業含め)">{{ old('ob_affiliation') }}</textarea>
                            </div>

                            <div class="d-flex flex-row justify-content-center gap-4 mt-5">
                                <a class="back-btn" href="/">戻る</a>
                                <button type="submit" class="post-submit-btn">送信</button>
                            </div>
                        </div>
                    </fieldset>
                    <input type="hidden" name="auth_key" value="{{ $auth_key }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden" name="subject_id" value="{{ $subject_id }}">
                </form>
            </div>
        </div>
    </div>
@endsection
