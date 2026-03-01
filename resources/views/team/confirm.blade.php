@extends('layout')
@section('content')
    <section class="page-title-section">
        <h1 class="page-title">登録確認画面</h1>
    </section>
    <div class="container">
        <div class="row justify-content-center mt50">
            <form method="POST" action="{{ route('team.post.join') }}">
                @csrf
                <fieldset>
                    <div class="table-container">
                        <table class="playerInfo">
                            <tr>
                                <th>
                                    メールアドレス：
                                </th>
                                <td>
                                    {{ $email }}
                                </td>
                            </tr>
                            <tr>
                                <th>チーム名：</th>
                                <td>
                                    <p>{{ $teams_name }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>活動場所：</th>
                                <td>
                                    <p>{{ $location }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>サイトURL：</th>
                                <td>
                                    <p>{{ $website }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    チーム方針・理念：
                                </th>
                                <td>
                                    {!! nl2br(e($teams_policy)) !!}

                                </td>
                            </tr>
                            <tr>
                                <th>
                                    スケジュール：
                                </th>
                                <td>
                                    {{ $schedule }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    OB情報：
                                </th>
                                <td>
                                    {{ $ob_affiliation }}
                                </td>
                            </tr>
                        </table>
                        <div class="d-flex flex-row justify-content-center gap-4 mt-5">
                            <a class="back-btn" href="/">戻る</a>
                            <button type="submit" class="post-submit-btn">送信</button>
                        </div>
                    </div>
                </fieldset>
                <input type="hidden" name="subject_id" value="{{ $subject_id }}">
                <input type="hidden" name="teams_name" value="{{ $teams_name }}">
                <input type="hidden" name="location" value="{{ $location }}">
                <input type="hidden" name="website" value="{{ $website }}">
                <input type="hidden" name="teams_policy" value="{{ $teams_policy }}">
                <input type="hidden" name="schedule" value="{{ $schedule }}">
                <input type="hidden" name="ob_affiliation" value="{{ $ob_affiliation }}">
            </form>
        </div>
    </div>
@endsection
