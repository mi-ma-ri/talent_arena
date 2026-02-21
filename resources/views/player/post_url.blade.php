@extends('layout')
@section('content')
    <section class="page-title-section">
        <h1 class="page-title">動画URL投稿</h1>
    </section>
    <div class="row">
        <div class="container mt-5">
            <div class="row justify-content-center background">
                <div class="col-md-4">
                    <form method="POST" action="{{ route('player.post.handle') }}" class="post-url-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2 mt-2">
                                <label class="form-label">投稿日</label>
                                <p class="form-control-plaintext text-white">{{ date('Y年m月d日') }}</p>
                            </div>
                        </div>
                        <fieldset class="fieldset-border">
                            <legend>動画URL</legend>
                            <div class="mb-3">
                                <label for="post_url1" class="form-label">URL 1</label>
                                @error('url1')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                <input type="url" class="form-control @error('url1') is-invalid @enderror"
                                    id="post_url1" name="url1" value="{{ old('url1') }}" placeholder="https://...">
                            </div>
                            <div class="mb-3">
                                <label for="post_url2" class="form-label">URL 2（任意）</label>
                                @error('url2')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                <input type="url" class="form-control @error('url2') is-invalid @enderror"
                                    id="post_url2" name="url2" value="{{ old('url2') }}" placeholder="https://...">
                            </div>
                            <div class="mb-2">
                                <label for="post_url3" class="form-label">URL 3（任意）</label>
                                @error('url3')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                <input type="url" class="form-control @error('url3') is-invalid @enderror"
                                    id="post_url3" name="url3" value="{{ old('url3') }}" placeholder="https://...">
                            </div>
                        </fieldset>
                        <div class="tooltip2">
                            <p>■ 記入例 ■</p>
                            <div class="description2">
                                下記フォーマットを例に入力をお願いします。<br>
                                ▫️ 背番号：10<br>
                                ▫️ 大会名：インターハイ県予選準決勝<br>
                                ▫️ 動画内で推したいこと：<br>
                                ① 攻撃でのチャンスメイク<br>
                                ② 運動量<br>
                                ③ 前線からの守備<br>
                                ※ 上記は必須として記載いただき、補足など他に伝えたいことは記述してください。100文字以内で記入をお願いします。<br>
                                <br><a class="font-color"
                                    href="https://sundryst.com/convenienttool/strcount.html">入力した文字数チェックはこちら</a>
                            </div>
                        </div>
                        <fieldset class="fieldset-border">
                            <legend>注目してほしいポイント</legend>
                            <div class="mb-2">
                                <label for="textarea_point" class="form-label">※ 記入例のフォーマットで入力をお願いします。</label>
                                @error('description')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                <textarea class="form-control video-post-textarea @error('description') is-invalid @enderror" id="textarea_point"
                                    name="description" rows="8">{{ old('description') }}</textarea>
                            </div>
                        </fieldset>
                        <div class="mt-4 mb-5 d-flex justify-content-center gap-4">
                            <a href="{{ route('player.get.info') }}" class="back-btn">戻る</a>
                            <input type="submit" class="post-submit-btn" value="投稿する">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
