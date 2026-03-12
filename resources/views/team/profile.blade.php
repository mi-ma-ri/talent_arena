@extends('layout')
@section('content')
    <div id="app">
        <header class="header">
            <a href="{{ route('index.top.index') }}" class="header-title">
                <img src="/talentarena.logo.png" class="header-logo" alt="Talent Arena">
            </a>
            <nav class="header-nav">
                <a href="{{ route('team.get.info') }}" class="header-link">ダッシュボード</a>
                <form action="{{ route('login.post.team.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="header-link">ログアウト</button>
                </form>
            </nav>
        </header>

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

        <main class="profile-main">
            <div class="container">
                <div class="profile-card">
                    <div class="profile-card-header">
                        <span class="profile-card-title">チーム登録情報</span>
                        <a href="{{ route('team.get.profile_edit') }}" class="profile-edit-btn">編集</a>
                    </div>
                    <div class="profile-card-body">
                        <div class="profile-row">
                            <span class="profile-label">登録アドレス</span>
                            <span class="profile-value">{{ $address }}</span>
                        </div>
                        <div class="profile-row">
                            <span class="profile-label">チーム名</span>
                            <span class="profile-value">{{ $teams_name }}</span>
                        </div>
                        <div class="profile-row">
                            <span class="profile-label">ウェブサイト</span>
                            <span class="profile-value">
                                @if ($website)
                                    <a href="{{ $website }}" target="_blank"
                                        class="profile-link">{{ $website }}</a>
                                @else
                                    -
                                @endif
                            </span>
                        </div>
                        <div class="profile-row">
                            <span class="profile-label">活動地域</span>
                            <span class="profile-value">{{ $location ?? '-' }}</span>
                        </div>
                        <div class="profile-row profile-row-block">
                            <span class="profile-label">チーム方針・規則</span>
                            <p class="profile-text">{!! nl2br(e($teams_policy)) !!}</p>
                        </div>
                        <div class="profile-row profile-row-block">
                            <span class="profile-label">スケジュール</span>
                            <p class="profile-text">{!! nl2br(e($schedule)) !!}</p>
                        </div>
                        <div class="profile-row profile-row-block">
                            <span class="profile-label">OB情報</span>
                            <p class="profile-text">{!! nl2br(e($ob_affiliation)) !!}</p>
                        </div>
                    </div>
                </div>

                <div class="back-btn-wrapper">
                    <a href="{{ route('team.get.info') }}" class="back-btn">戻る</a>
                </div>
            </div>
        </main>
    </div>
@endsection
