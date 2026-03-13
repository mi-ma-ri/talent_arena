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
            <h1 class="page-title">選手投稿一覧</h1>
        </section>

        <main class="players-list-main">
            <div class="container">
                @if (empty($playerVideos))
                    <div class="no-players-message">
                        <p>選手の投稿がまだありません。</p>
                    </div>
                @else
                    <div class="players-grid">
                        @foreach ($playerVideos as $video)
                            <div class="player-card">
                                <div class="player-card-header">
                                    <span class="player-name">{{ $video['player']['first_name'] }}
                                        {{ $video['player']['second_name'] }}</span>
                                    <span class="player-position">{{ $video['player']['position'] }}</span>
                                </div>
                                <div class="player-card-body">
                                    <div class="player-info-row">
                                        <span class="player-info-label">現所属</span>
                                        <span class="player-info-value">{{ $video['player']['affiliated_team'] }}</span>
                                    </div>
                                    <div class="player-info-row">
                                        <span class="player-info-label">生年月日</span>
                                        <span class="player-info-value">{{ $video['player']['birth_date'] }}</span>
                                    </div>
                                    <div class="player-video-links">
                                        @if ($video['sns_url_1'])
                                            <a href="{{ $video['sns_url_1'] }}" target="_blank" class="video-link">動画1</a>
                                        @endif
                                        @if ($video['sns_url_2'])
                                            <a href="{{ $video['sns_url_2'] }}" target="_blank" class="video-link">動画2</a>
                                        @endif
                                        @if ($video['sns_url_3'])
                                            <a href="{{ $video['sns_url_3'] }}" target="_blank" class="video-link">動画3</a>
                                        @endif
                                    </div>
                                    @if ($video['description'])
                                        <div class="player-description">
                                            <span class="player-info-label">コメント</span>
                                            <p class="player-description-text">{{ $video['description'] }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="back-btn-wrapper">
                    <a href="{{ route('team.get.info') }}" class="back-btn">戻る</a>
                </div>
            </div>
        </main>
    </div>
@endsection
