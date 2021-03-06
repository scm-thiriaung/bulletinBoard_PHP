<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simple Laravel Form</title>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/post/post.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common/common.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="links header headerBorderLine">
    @if (isset(Auth::user()->email))
      @include('common.header')
    @endif
  </div>
  <br>
  <br>
  <h3 align="center" class="title">PostDetail</h3><br />
  <div class="container py-3">
    <div class="row" style="margin-top:11px;">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-body">
            <b style="font-size:20px;">Title</b>
            {{ $post[0]->title }}
          </div>
          <div class="card-body">
            <b style="font-size:20px;">Description</b>
            {{ $post[0]->description }}
          </div>
          <div class="card-body">
            <b style="font-size:20px;">Name</b>
            {{ $post[0]->name }}
          </div>
          <a href="{{ route('post.index') }}" class="btn btnBack my-sm-0"
            style="height:27px;padding-bottom:28px;">Back to List</a>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>
