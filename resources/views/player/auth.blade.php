@extends('layout')
@php
    use App\consts\CommonConsts;
    use Carbon\Carbon;
    $now = new Carbon();
    $minYear = $now->year - 25;
    $maxYear = $now->year - 18;
@endphp
<div class="container">
    <div class="row">
        <div class="col-md-6 w-50">
            <h1 class="display-1 font-left-player">選手<br>情報入力</h1>
        </div>
        <div class="col-md-6 w-50">
            <form method="POST" action="/player/confirm">
                @csrf
                <fieldset>
                    <legend class="font-right-player">以下の必要情報を入力してください。</legend>
                    <div class="font-right-player">
                        <!-- メールアドレス -->
                        <label for="email" class="form-label">ご登録メールアドレス</label>
                        <address>{{ $email }}</address>
                        <!-- パスワード -->
                        <label for="password" class="form-label">パスワード</label>
                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                        <input type="password"
                            class="form-control pt-3 pb-3 mb-2 @error('password') is-invalid @enderror"
                            id="TeamPassword" name="password" placeholder="半角英数字8文字以上16桁以内">
                        <!-- 生年月日 -->
                        <div class="mb-3">
                            <label for="position" class="form-label">生年月日</label>
                            <div class="row g-2">
                                <div class="col-12 col-sm-4">
                                    <select name="birth_year"
                                        class="form-select @error('birth_year') is-invalid @enderror" aria-label="生年">
                                        <option value="" selected disabled>年</option>
                                        @for ($year = $maxYear; $year >= $minYear; $year--)
                                            <option value="{{ $year }}"
                                                {{ old('birth_year') == $year ? 'selected' : '' }}>
                                                {{ $year }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <select name="birth_month"
                                        class="form-select @error('birth_month') is-invalid @enderror" aria-label="月">
                                        <option value="" selected disabled>月</option>
                                        @for ($month = 1; $month <= 12; $month++)
                                            <option value="{{ $month }}"
                                                {{ old('birth_month') == $month ? 'selected' : '' }}>
                                                {{ $month }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <select name="birth_day"
                                        class="form-select @error('birth_day') is-invalid @enderror" aria-label="日">
                                        <option value="" selected disabled>日</option>
                                        @for ($day = 1; $day <= 31; $day++)
                                            <option value="{{ $day }}"
                                                {{ old('birth_day') == $day ? 'selected' : '' }}>
                                                {{ $day }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- 姓名 -->
                        <div class="row">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">姓</label>
                                @error('first_name')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                <input type="text" id="first_name"
                                    class="form-control pt-3 pb-3 mb-2 @error('first_name') is-invalid @enderror"
                                    name="first_name" placeholder="姓をご入力ください。">
                            </div>
                            <div class="col-md-6">
                                <label for="second_name" class="form-label">名</label>
                                @error('second_name')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                <input type="text" id="second_name"
                                    class="form-control pt-3 pb-3 mb-2 @error('second_name') is-invalid @enderror"
                                    name="second_name" placeholder="名をご入力ください。">
                            </div>
                        </div>
                        <!-- 前所属チーム -->
                        <label for="affiliated_team" class="form-label">前所属チーム</label>
                        @error('affiliated_team')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                        <input type="affiliated_team"
                            class="form-control pt-3 pb-3 mb-2 @error('affiliated_team') is-invalid @enderror"
                            id="affiliated_team" name="affiliated_team" placeholder="前所属チーム名をご入力ください。">
                        <!-- ポジション -->
                        <label for="position" class="form-label">ポジション</label>
                        @error('position')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                        <input type="position"
                            class="form-control pt-3 pb-3 mb-2 @error('position') is-invalid @enderror" id="position"
                            name="position" placeholder="ポジションをご入力ください。例:サイドバック,サイドハーフ">
                        <!-- 同意チェックボックス -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="agreementCheckbox" required>
                            <label class="form-check-label" for="agreementCheckbox">
                                登録情報を確認しました
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary player-regi__btn" id="submitButton">
                        送信
                    </button>
                </fieldset>
                <input type="hidden" name="auth_key" value="{{ $auth_key }}">
                <input type="hidden" name="subject_id" value="{{ $subject_id }}">
            </form>
        </div>
    </div>
</div>
