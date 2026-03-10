@extends('layout')
@section('content')
    <section class="page-title-section">
        <h1 class="page-title">選手プロフィール編集</h1>
    </section>
    <div class="row">
        <div class="row justify-content-center">
            <div class="col-md-4 info_top">
                <form method="POST" action="{{ route('team.post.profile_update') }}">
                    @csrf
                    <fieldset>
                        <div class="table-container">
                            <table class="playerInfo">
                                <tr>
                                    <th>
                                        メールアドレス
                                        @error('address')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </th>
                                    <td>
                                        <input type="email" class="form-control edit-common" id="address" name="address"
                                            value="{{ $address }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>チーム名</th>
                                    <td>
                                        <p>{{ $teams_name }} </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        ウェブサイト
                                        @error('website')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </th>
                                    <td>
                                        <input type="url" class="form-control edit-common" id="website" name="website"
                                            value="{{ $website }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        活動地域
                                        @error('location')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </th>
                                    <td>
                                        <input type="text" class="form-control edit-common" id="location"
                                            name="location" value="{{ $location }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        チーム方針・規則
                                        @error('teams_policy')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </th>
                                    <td>
                                        <textarea class="form-control edit-common" id="teams_policy" name="teams_policy" rows="3">{{ $teams_policy }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        スケジュール
                                        @error('schedule')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </th>
                                    <td>
                                        <textarea class="form-control edit-common" id="schedule" name="schedule" rows="3">{{ $schedule }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        OB情報
                                        @error('ob_affiliation')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </th>
                                    <td>
                                        <textarea class="form-control edit-common" id="ob_affiliation" name="ob_affiliation" rows="3">{{ $ob_affiliation }}</textarea>
                                    </td>
                                </tr>
                            </table>
                            <div class="d-flex justify-content-end mt-5">
                                <button type="submit" class="edit-button">
                                    {{ __('更新') }}
                                </button>
                                <a href="{{ route('team.get.info') }}" class="edit-button">戻る</a>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
