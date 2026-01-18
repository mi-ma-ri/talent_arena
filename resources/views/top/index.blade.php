@extends('layout')
@section('content')
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div id="app">
                <header class="header">
                    <a href="{{ url('/') }}" class="header-title">
                        <img src="/talentarena.logo.png" class="header-logo" alt="Talent Arena">
                    </a>
                    <nav class="header-nav">
                        <a href="{{ route('player.get.temporary') }}" class="header-link">選手ログインはこちら</a>
                        <a href="{{ route('player.get.temporary') }}" class="header-link">選手登録はこちら</a>
                    </nav>
                </header>
            </div>
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="/soccer_ball.jpeg" class="w-100" alt="...">
                <div class="carousel-caption">
                    <h1 class="top-title">
                        <span>あなたのプレーが、</span><br>
                        <span>次のステージへの扉を開く</span>
                    </h1>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="/team.jpeg" class="w-100" alt="...">
                <div class="carousel-caption">
                    <h1 class="top-title">
                        <span>才能との出会い</span><br>
                        <span>スカティング力でチーム力向上</span>
                    </h1>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endsection
