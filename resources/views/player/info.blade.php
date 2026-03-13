@extends('layout')
@section('content')
    <div id="app">
        <header class="header">
            <a href="{{ route('player.get.info') }}" class="header-title">
                <img src="/talentarena.logo.png" class="header-logo" alt="Talent Arena">
            </a>
            <nav class="header-nav">
                <form action="{{ route('login.post.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="header-link">ログアウト</button>
                </form>
            </nav>
        </header>

        {{-- フラッシュメッセージ --}}
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

        <main class="team-info-main">
            <div class="team-info-content">
                <h2 class="team-info-heading">メニューを選択してください</h2>
                <div class="team-info-buttons">
                    <a href="{{ route('player.get.profile') }}" class="team-info-btn">
                        <span class="team-info-btn-icon">👤</span>
                        <span class="team-info-btn-text">プロフィール詳細</span>
                    </a>
                    <a href="{{ route('player.get.url') }}" class="team-info-btn">
                        <span class="team-info-btn-icon">+</span>
                        <span class="team-info-btn-text">新規動画URL投稿</span>
                    </a>
                    <a href="{{ route('player.get.url_list') }}" class="team-info-btn">
                        <span class="team-info-btn-icon">👀</span>
                        <span class="team-info-btn-text">動画URL投稿一覧</span>
                    </a>
                    <a href="{{ route('player.get.teams_profile') }}" class="team-info-btn">
                        <span class="team-info-btn-icon">⚽️</span>
                        <span class="team-info-btn-text">チーム情報一覧</span>
                    </a>
                </div>
            </div>
        </main>
    </div>
@endsection
