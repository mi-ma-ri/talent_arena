@extends('layouts.app')
@section('body-class', 'background')
@section('choose_register')

<body>
  <div class="text-center">
    <img src="{{ asset('/logo_header.png') }}" class="register-logo" >
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 w-50">
        <h1 class="display-1 font-left">新規登録</h1>
      </div>
      <div class="col-md-6 mt-5 w-50">
        @if (Route::has('player_register'))
          <a class="btn d-block font-right border p-4 px-5 mb-3 rounded mb-5" href="{{ route('player_register') }}">{{ __('選手としてスカウトされたい') }}</a>
        @endif
        @if (Route::has('scout_register'))
          <a class="btn d-block font-right border p-4 px-5 mb-3 rounded mb-5" href="{{ route('scout_register') }}">{{ __('選手をスカウトしたい') }}</a>
        @endif
      </div>
    </div>
  </div>

</body>
@endsection