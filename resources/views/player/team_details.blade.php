@extends('layout')
@section('content')
    <div id="app">
        <section class="page-title-section">
            <h1 class="page-title">チーム情報詳細</h1>
        </section>
        <main class="profile-main">
            <div class="container">
                <div class="profile-card">
                    <div class="profile-card-body">
                        <div class="profile-row">
                            <span class="profile-label">ウェブサイト</span>
                            <span class="profile-value">
                                @if ($team['website'])
                                    <a href="{{ $team['website'] }}" target="_blank" class="profile-link">サイトはこちら</a>
                                @else
                                    -
                                @endif
                            </span>
                        </div>
                        <div class="profile-row">
                            <span class="profile-label">活動地域</span>
                            <span class="profile-value">{{ $team['location'] ?? '-' }}</span>
                        </div>
                        <div class="profile-row profile-row-block">
                            <span class="profile-label">チーム方針・規則</span>
                            <p class="profile-text">{!! nl2br(e($team['teams_policy'])) !!}</p>
                        </div>
                        <div class="profile-row profile-row-block">
                            <span class="profile-label">スケジュール</span>
                            <p class="profile-text">{!! nl2br(e($team['schedule'])) !!}</p>
                        </div>
                        <div class="profile-row profile-row-block">
                            <span class="profile-label">OB情報</span>
                            <p class="profile-text">{!! nl2br(e($team['ob_affiliation'])) !!}</p>
                        </div>
                    </div>
                </div>

                <div class="back-btn-wrapper">
                    <a href="{{ route('player.get.teams_profile') }}" class="back-btn">戻る</a>
                </div>
            </div>
        </main>
    </div>
@endsection
