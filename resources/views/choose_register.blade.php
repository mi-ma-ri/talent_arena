@extends('layouts.app')

@section('choose_register')

<body>
  <div class="text-center">
    <img src="logo_header.png" alt="サンプル画像" style="width:350px;">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="display-1 font-left">新規登録</h1>
      </div>
      <div class="col-md-6 mt-5">
        <a href="{{ url('/player_register') }}" class="btn d-block font-right border p-4 px-5 mb-3 rounded mb-5">選手としてスカウトされたい</a>
        <button class="btn d-block font-right border p-4 px-5 mb-3 rounded">チーム・組織として選手をスカウトしたい</button>
      </div>
    </div>
  </div>

</body>
@endsection