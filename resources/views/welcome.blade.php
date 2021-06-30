<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/welcome/welcome.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <title>Simple Laravel Form</title>
</head>

<body>
  <div class="header headerBorderLine">
    @if (isset(Auth::user()->email))
      @include('common.header')
    @else
      <a href="{{ route('register') }}" style="font-size:20px;margin-right:19px;" class="FloatRight">Register</a>
      <a href="{{ route('login') }}" style="font-size:20px;margin-right:19px;" class="FloatRight">Login</a>
    @endif
  </div>
  <div class="content">
    <div class="title m-b-md">
      Laravel
    </div>
    <div class="links">
      <a href="#">Documentation</a>
      <a href="#">Laracasts</a>
      <a href="#">News</a>
      <a href="#">Forge</a>
      <a href="#">GitHub</a>
    </div>
  </div>
</body>

</html>
