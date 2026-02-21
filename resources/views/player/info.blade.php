@extends('layout')
@section('content')
    <section class="page-title-section">
        <h1 class="page-title"></h1>
    </section>
    <div id="app">
        {{-- 動画投稿ボタン --}}
        <div class="video-post-btn-wrapper">
            <a href="{{ route('player.post.url') }}" class="video-post-btn">+ 新しい動画を投稿する</a>
        </div>
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
        <header class="header">
            <a href="{{ route('player.get.info') }}" class="header-title">
                <img src="/talentarena.logo.png" class="header-logo" alt="Talent Arena">
            </a>
            <nav class="header-nav">
                <a href="{{ route('player.get.profile') }}" class="header-link">プロフィール詳細</a>
                <form action="{{ route('login.post.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="header-link">ログアウト</button>
                </form>
            </nav>
        </header>
    </div>
@endsection
