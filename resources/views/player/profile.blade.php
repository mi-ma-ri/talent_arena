@extends('layout')
@section('content')
    <section class="page-title-section">
        <h1 class="page-title">選手プロフィール</h1>
    </section>
    <div class="row">
        <div class="row justify-content-center">
            <div class="col-md-4 info_top">
                <fieldset>
                    <div class="table-container">
                        <table class="playerInfo">
                            <tr>
                                <th>登録アドレス</th>
                                <td>
                                    <p>{{ $address }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>氏名</th>
                                <td>
                                    <p>{{ $first_name }} {{ $second_name }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>現所属チーム</th>
                                <td>
                                    <p>{{ $affiliated_team }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>得意ポジション</th>
                                <td>
                                    <p>{{ $position }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>生年月日</th>
                                <td>
                                    <p>{{ $birth_date }}</p>
                                </td>
                            </tr>

                        </table>
                        <div class="d-flex justify-content-end mt-5">
                            <a href="{{ route('player.get.info') }}">戻る</a>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
@endsection
