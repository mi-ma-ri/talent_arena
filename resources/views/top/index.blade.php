@extends('layout')
@section('content')
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div id="app">
                <div class="header">
                    <div class="container-fluid d-flex align items-center justify-content-between">
                        <a href="{{ url('/') }}" class="navbar-brand header-title">
                            <img src="{{ asset('/talentarena.logo.png') }}" class="header-logo">
                            <a href="{{ route('player.get.temporary') }}">学生はこちらから</a>
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="/soccer_ball.jpeg" class="w-100" alt="...">
                <div class="carousel-caption">
                    <h2 class="top-title__sub">
                        <span>プロの世界で活躍したい。</span>
                        <span>チームに貢献できる選手になりたい。</span>
                    </h2>
                    <h1 class="top-title">
                        <span>活躍するステージを切り拓け</span>
                    </h1>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="/team.jpeg" class="w-100" alt="...">
                <div class="carousel-caption">
                    <h2 class="top-title__sub">
                        <span>日本一のチームを作りたい。</span>
                        <span>世界で活躍する選手を輩出したい。</span>
                    </h2>
                    <h1 class="top-title">
                        <span>スカウトティングの質をあげて<br></span>
                        <span>チーム力を向上させる。</span>
                    </h1>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="10000">
                <img src="/logo_header.png" class="w-100" alt="...">
                <div class="carousel-caption__main">
                    <span class="top-title">
                        TalentArenaから世界で通用する選手を発掘</span>
                    </span>
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
