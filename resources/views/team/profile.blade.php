@extends('layout')
@section('content')
    <section class="page-title-section">
        <h1 class="page-title">チームプロフィール</h1>
    </section>

    @if (session('success'))
        <div class="flash-message flash-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="flash-message flash-error">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <div class="row justify-content-center">
            <div class="col-md-4 info_top">
                <fieldset>
                    <div class="table-container">
                        <div class="d-flex justify-content-end mt-5">
                            <a href="{{ route('team.get.profile_edit') }}" class="edit-button">編集</a>
                        </div>
                        <table class="playerInfo">
                            <tr>
                                <th>登録アドレス</th>
                                <td>
                                    <p>{{ $address }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>登録チーム名</th>
                                <td>
                                    <p>{{ $teams_name }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>ウェブサイト</th>
                                <td>
                                    <a href="{{ $website }}" target="_blank">
                                        サイトURLはこちら
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>活動地域</th>
                                <td>
                                    <p>{{ $location }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>チーム方針・規則</th>
                                <td>
                                    {!! nl2br(e($teams_policy)) !!}
                                </td>
                            </tr>
                            <tr>
                                <th>スケジュール</th>
                                <td>
                                    {!! nl2br(e($schedule)) !!}
                                </td>
                            </tr>
                            <tr>
                                <th>OB情報</th>
                                <td>
                                    {!! nl2br(e($ob_affiliation)) !!}
                                </td>
                            </tr>
                        </table>
                        <div class="d-flex justify-content-end mt-5">
                            <a href="{{ route('team.get.info') }}" class="edit-button">戻る</a>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
@endsection
