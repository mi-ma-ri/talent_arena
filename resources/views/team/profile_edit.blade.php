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
            <h1 class="page-title">チームプロフィール編集</h1>
        </section>

        <main class="profile-main">
            <div class="container">
                <form method="POST" action="{{ route('team.post.profile_update') }}">
                    @csrf
                    <div class="profile-card">
                        <div class="profile-card-header">
                            <span class="profile-card-title">登録情報の編集</span>
                        </div>
                        <div class="profile-card-body">
                            <div class="profile-edit-row">
                                <label for="address" class="profile-edit-label">メールアドレス</label>
                                <div class="profile-edit-input-wrapper">
                                    <input type="email" class="profile-edit-input" id="address" name="address"
                                        value="{{ $address }}">
                                    @error('address')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="profile-edit-row">
                                <label class="profile-edit-label">チーム名</label>
                                <div class="profile-edit-input-wrapper">
                                    <span class="profile-edit-static">{{ $teams_name }}</span>
                                </div>
                            </div>

                            <div class="profile-edit-row">
                                <label for="website" class="profile-edit-label">ウェブサイト</label>
                                <div class="profile-edit-input-wrapper">
                                    <input type="url" class="profile-edit-input" id="website" name="website"
                                        value="{{ $website }}">
                                    @error('website')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="profile-edit-row">
                                <label for="location" class="profile-edit-label">活動地域</label>
                                <div class="profile-edit-input-wrapper">
                                    <input type="text" class="profile-edit-input" id="location" name="location"
                                        value="{{ $location }}">
                                    @error('location')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="profile-edit-row profile-edit-row-block">
                                <label for="teams_policy" class="profile-edit-label">チーム方針・規則</label>
                                <div class="profile-edit-input-wrapper">
                                    <textarea class="profile-edit-textarea" id="teams_policy" name="teams_policy" rows="4">{{ $teams_policy }}</textarea>
                                    @error('teams_policy')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="profile-edit-row profile-edit-row-block">
                                <label for="schedule" class="profile-edit-label">スケジュール</label>
                                <div class="profile-edit-input-wrapper">
                                    <textarea class="profile-edit-textarea" id="schedule" name="schedule" rows="4">{{ $schedule }}</textarea>
                                    @error('schedule')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="profile-edit-row profile-edit-row-block">
                                <label for="ob_affiliation" class="profile-edit-label">OB情報</label>
                                <div class="profile-edit-input-wrapper">
                                    <textarea class="profile-edit-textarea" id="ob_affiliation" name="ob_affiliation" rows="4">{{ $ob_affiliation }}</textarea>
                                    @error('ob_affiliation')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="profile-edit-buttons">
                        <a href="{{ route('team.get.profile') }}" class="back-btn">戻る</a>
                        <button type="submit" class="profile-submit-btn">更新</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection
