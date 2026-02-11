@extends('layout')
@php $dob = \Carbon\Carbon::create($birth_year,$birth_month,$birth_day); @endphp

<div class="container">
    <div class="row">
        <div class="col-md-2 w-50">
            <h1 class="display-6 font-left-player">{{ $title }}</h1>
        </div>
        <div class="col-md-5 w-50">
            <form action="/player/join" method="POST">
                @csrf
                <dl class="row">
                    <dt class="col-sm-3">パスワード</dt>
                    <dd class="col-sm-9">**********(ご自身で設定したパスワード)</dd>

                    <dt class="col-sm-3">氏名</dt>
                    <dd class="col-sm-9">{{ $first_name }} {{ $second_name }}</dd>

                    <dt class="col-sm-3">生年月日</dt>
                    <dd class="col-sm-9">
                        <time datetime="{{ $dob->toDateString() }}">{{ $dob->format('Y年n月j日') }}</time>
                        （{{ $dob->age }}歳）
                    </dd>
                    <dt class="col-sm-3">現所属チーム</dt>
                    <dd class="col-sm-9">{{ $affiliated_team }}</dd>

                    <dt class="col-sm-3">ポジション</dt>
                    <dd class="col-sm-9">{{ $position }}</dd>
                </dl>
                <button type="submit" class="btn btn-primary player-regi__btn" id="submitButton">
                    送信
                </button>
                <input type="hidden" name="subject_id" value="{{ $subject_id }}">
                <input type="hidden" name="password" value="{{ $password }}">
                <input type="hidden" name="first_name" value="{{ $first_name }}">
                <input type="hidden" name="second_name" value="{{ $second_name }}">
                <input type="hidden" name="affiliated_team" value="{{ $affiliated_team }}">
                <input type="hidden" name="position" value="{{ $position }}">
                <input type="hidden" name="birth_date" value="{{ $dob->toDateString() }}">
            </form>
        </div>
    </div>
</div>
