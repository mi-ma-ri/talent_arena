@extends('layout')
@section('content')
    <section class="page-title-section">
        <h1 class="page-title">マイページ</h1>
    </section>
    <div id="app">
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

        <div class="container mt-4">
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

            {{-- 動画投稿ボタン --}}
            <div class="video-post-btn-wrapper mb-4">
                <a href="{{ route('player.post.url') }}" class="video-post-btn">+ 新しい動画を投稿する</a>
            </div>

            {{-- 動画一覧 --}}
            <section class="video-list-section">
                <h2 class="video-list-title">投稿一覧</h2>

                @if (isset($video_data) && count($video_data) > 0)
                    <div class="video-list">
                        @foreach ($video_data as $video)
                            <div class="video-card">
                                <div class="video-card-header">
                                    <span class="video-date">投稿日：{{ $video['created_at'] ?? '日付なし' }}</span>
                                </div>
                                <div class="video-card-body">
                                    {{-- URL1 --}}
                                    @if (!empty($video['sns_url_1']))
                                        <div class="video-item">動画①：
                                            <a href="{{ $video['sns_url_1'] }}" target="_blank"
                                                class="video-url">{{ $video['sns_url_1'] }}</a>
                                        </div>
                                    @endif

                                    {{-- URL2 --}}
                                    @if (!empty($video['sns_url_2']))
                                        <div class="video-item">動画②
                                            <a href="{{ $video['sns_url_2'] }}" target="_blank"
                                                class="video-url">{{ $video['sns_url_2'] }}</a>
                                        </div>
                                    @endif

                                    {{-- URL3 --}}
                                    @if (!empty($video['sns_url_3']))
                                        <div class="video-item">動画③
                                            <p class="video-title">{{ $video['sns_url_3'] ?? '動画3' }}</p>
                                            <a href="{{ $video['sns_url_3'] }}" target="_blank"
                                                class="video-url">{{ $video['sns_url_3'] }}</a>
                                        </div>
                                    @endif

                                    {{-- 注目ポイント --}}
                                    <div class="video-point">
                                        <p class="video-point-label">注目ポイント</p>
                                        <p class="video-point-text">{{ $video['description'] ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="no-video-message">
                        <p>まだ動画が投稿されていません。</p>
                        <p>「+ 新しい動画を投稿する」ボタンから投稿してください。</p>
                    </div>
                @endif
            </section>
        </div>
    </div>
@endsection
