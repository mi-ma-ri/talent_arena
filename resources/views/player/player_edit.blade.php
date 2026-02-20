@extends('layout')
@section('content')
    <section class="page-title-section">
        <h1 class="page-title">選手プロフィール編集</h1>
    </section>
    <div class="row">
        <div class="row justify-content-center">
            <div class="col-md-4 info_top">
                <form method="POST" action="{{ route('player.post.profile_update') }}">
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
                                        <input type="email" class="form-control edit-common" id="playerEmail"
                                            name="address" value="{{ $address }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>氏名</th>
                                    <td>
                                        <p>{{ $first_name }} {{ $second_name }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>生年月日</th>
                                    <td>
                                        <p>{{ $birth_date }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>現所属チーム</th>
                                    <td>
                                        <p>{{ $affiliated_team }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        ポジション
                                        @error('position')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </th>
                                    <td>
                                        <input type="text" class="form-control edit-common" id="playerPosition"
                                            name="position" value="{{ $position }}">
                                    </td>
                                </tr>
                            </table>
                            <div class="d-flex justify-content-end mt-5">
                                <button type="submit" class="edit-button">
                                    {{ __('更新') }}
                                </button>
                                <a href="{{ route('player.get.info') }}" class="edit-button">戻る</a>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
