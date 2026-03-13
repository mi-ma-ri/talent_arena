@extends('layout')
@section('content')
    <div id="app">
        <header class="header">
            <a href="{{ route('index.top.index') }}" class="header-title">
                <img src="/talentarena.logo.png" class="header-logo" alt="Talent Arena">
            </a>
            <nav class="header-nav">
                <form action="{{ route('login.post.team.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="header-link">ログアウト</button>
                </form>
            </nav>
        </header>

        <main class="team-info-main">
            <div class="team-info-content">
                <h2 class="team-info-heading">メニューを選択してください</h2>
                <div class="team-info-buttons">
                    <a href="{{ route('team.get.profile') }}" class="team-info-btn">
                        <span class="team-info-btn-icon">👤</span>
                        <span class="team-info-btn-text">プロフィール詳細</span>
                    </a>
                    <a href="{{ route('team.get.player_videos') }}" class="team-info-btn">
                        <span class="team-info-btn-icon">🎬</span>
                        <span class="team-info-btn-text">選手投稿一覧</span>
                    </a>
                </div>
            </div>
        </main>
    </div>
@endsection
