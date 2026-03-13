@extends('layout')
@section('content')
    <div id="app">
        <section class="page-title-section">
            <h1 class="page-title">チーム情報一覧</h1>
        </section>

        <main class="teams-list-main">
            @foreach ($teams as $team)
                <div class="container">
                    {{-- デザイン確認用ダミーデータ --}}
                    <div class="teams-list">
                        <a href="{{ route('player.get.team_detail', ['id' => $team['id']]) }}" class="team-list-item">
                            <span class="team-list-name">{{ $team['teams_name'] }}</span>
                            <span class="team-list-arrow">→</span>
                        </a>
                    </div>
                </div>
            @endforeach
            <div class="back-btn-wrapper">
                <a href="{{ route('player.get.info') }}" class="back-btn">戻る</a>
            </div>
        </main>
    </div>
@endsection
