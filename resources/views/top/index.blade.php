@extends('layout')
@section('content')
    <div class="top-page">
        {{-- ヘッダー --}}
        <header class="top-header">
            <a href="{{ url('/') }}" class="header-title">
                <img src="/talentarena.logo.png" class="header-logo" alt="Talent Arena">
            </a>
        </header>

        {{-- カルーセル --}}
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                {{-- 選手向けスライド --}}
                <div class="carousel-item active" data-bs-interval="5000">
                    <div class="carousel-slide">
                        <div class="carousel-bg">
                            <img src="/soccer_ball.jpeg" alt="選手向け">
                        </div>
                        <div class="carousel-content">
                            <div class="carousel-text">
                                <h1 class="top-title">
                                    <span>あなたのプレーが、</span><br>
                                    <span>次のステージへの扉を開く</span>
                                </h1>
                                <p class="top-description">動画を投稿してスカウトにアピールしよう</p>
                            </div>
                            <div class="carousel-cta">
                                <div class="cta-box">
                                    <h2 class="cta-title">選手の方</h2>
                                    <p class="cta-description">動画を投稿して<br>あなたの才能をアピール</p>
                                    <div class="cta-buttons">
                                        <a href="{{ route('login.get.attempt') }}" class="cta-btn cta-btn-primary">ログイン</a>
                                        <a href="{{ route('player.get.temporary') }}"
                                            class="cta-btn cta-btn-secondary">新規登録</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- チーム向けスライド --}}
                <div class="carousel-item" data-bs-interval="5000">
                    <div class="carousel-slide">
                        <div class="carousel-bg">
                            <img src="/team.jpeg" alt="チーム向け">
                        </div>
                        <div class="carousel-content">
                            <div class="carousel-text">
                                <h1 class="top-title">
                                    <span>才能との出会い</span><br>
                                    <span>スカウティングでチーム力向上</span>
                                </h1>
                                <p class="top-description">未来のスター選手を見つけよう</p>
                            </div>
                            <div class="carousel-cta">
                                <div class="cta-box">
                                    <h2 class="cta-title">チームの方</h2>
                                    <p class="cta-description">才能ある選手を<br>スカウトしよう</p>
                                    <div class="cta-buttons">
                                        {{-- <a href="{{ route('login.get.attempt') }}" class="cta-btn cta-btn-primary">ログイン</a> --}}
                                        <a href="{{ route('team.get.temporary') }}"
                                            class="cta-btn cta-btn-secondary">新規登録</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- カルーセルコントロール --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

            {{-- カルーセルインジケーター --}}
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="選手向け"></button>
                <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1"
                    aria-label="チーム向け"></button>
            </div>
        </div>
    </div>
@endsection
