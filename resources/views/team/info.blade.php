@extends('layout')
@section('content')
    <div id="app">
        <header class="header">
            <a href="{{ route('index.top.index') }}" class="header-title">
                <img src="/talentarena.logo.png" class="header-logo" alt="Talent Arena">
            </a>
            <nav class="header-nav">
                <a href="{{ route('team.get.profile') }}" class="header-link">プロフィール詳細</a>
                <form action="{{ route('login.post.team.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="header-link">ログアウト</button>
                </form>
            </nav>
        </header>
    </div>
@endsection
