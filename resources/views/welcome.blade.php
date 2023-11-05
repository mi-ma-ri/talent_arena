@extends('layouts.app')
@section('lp')
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000">
            <img src="/soccer_ball.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>「怪我が理由でセレクションに参加できなかった」</h2><br>
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
                <h1>自分が活躍できるNextStageを見つけろ</h1><br>
                <h1 class="logo-ver">未来のエース・原石はどこにいる？</h1><br>
                <h1>TalentArenaから世界で戦える選手・チームへ</h1>
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