<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simple Laravel Form</title>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
  <h3 align="center" style="font-size:28px;">Post Update</h3><br />
  @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
  @endif

  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <div class="container py-3">
    <div class="row">
      <div class="card-body">
        <form method="POST" action="{{ route('post.update', $post->id) }}">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="form-group">
            <h2 for="title">Title</h2>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}" style="font-size:14px;">
          </div>

          <div class="form-group">
            <h2 for="description">Description</h2>
            <textarea name="description" rows="8" cols="80" class="form-control"
              style="font-size:14px;">{{ $post->description }}</textarea>
          </div>
          <button type="submit" class="btn btnEdit" style="height:28px;">Update Post</button>&nbsp;&nbsp;
          <a href="{{ route('post.index') }}" class="btn btnBack my-2 my-sm-0">Back to List</a>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
