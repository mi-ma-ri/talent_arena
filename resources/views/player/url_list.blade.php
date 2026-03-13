@extends('layout')
@section('content')
    <div id="app">
        <section class="page-title-section">
            <h1 class="page-title">動画URL投稿一覧</h1>
        </section>

        <main class="players-list-main">
            <div class="container">
                @if (empty($video_data))
                    <div class="no-players-message">
                        <p>選手の投稿がまだありません。</p>
                    </div>
                @else
                    <div class="players-grid">
                        @foreach ($video_data as $video)
                            <div class="player-card">
                                <div class="player-card-header">
                                    <span class="player-name">投稿日：{{ $video['created_at'] }}
                                </div>
                                <div class="player-card-body">
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
                                            <span class="player-info-label">ポイント</span>
                                            <p class="player-description-text">{{ $video['description'] }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="back-btn-wrapper">
                    <a href="{{ route('player.get.info') }}" class="back-btn">戻る</a>
                </div>
            </div>
        </main>
    </div>
@endsection
