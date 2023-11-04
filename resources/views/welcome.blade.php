@extends('layouts.app')
@section('lp')
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000">
            <img src="/soccer_ball.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>「高3の夏に怪我をして、選手としては大学サッカーを諦めた」</h2><br>
                <h2>「自分なんてどうせ可能性のない選手だ」</h2><br>
                <h2>「どうせ俺のプレーなんて誰も注目していない」</h2><br>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
            <img src="/team.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>「日本一のチームを作りたい」</h2><br>
                <h2>「世界で活躍する選手を輩出できるチームにしたい」</h2><br>
                <h2>「眠っている才能を開花させたい」</h2><br>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="10000">
            <img src="/logo.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>自分のプレー動画を投稿して、活躍できるNextStageを見つける</h2><br>
                <h2 class="logo-ver">入団・入部させたいあの選手のプレーをシステム上で確認できる</h2><br>
                <h1>〜TalentArenaから"世界で戦える選手・チームへ"〜</h1><br>
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