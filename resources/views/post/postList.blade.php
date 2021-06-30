<!DOCTYPE html>
<html>

<head>
  <title>Simple Laravel Form</title>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/post/post.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="links header headerBorderLine">
    @if (isset(Auth::user()->email))
      @include('common.header')
    @endif
  </div>
  <br>
  <br>
  <h3 align="center" class="title">PostList</h3><br />
  @if (session('message'))
    <div class="alert alert-danger">
      {{ session('message') }}
    </div>
  @endif
  <div class="container py-3" id="navbarSupportedContent">
    @include('common.post.header_button')
    @if (isset(Auth::user()->email))
      <div class="container py-3">
        <div class="row" style="margin-top:11px;">
          @foreach ($posts as $post)
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h4>{{ $post->title }}</h4>
                </div>
                <div class="card-body">
                  <p style="font-size:14px;">{{ substr($post->description, 0, 100) }}</p>
                  @include('common.post.buttonandlink')
                </div>
              </div>
              <br>
            </div>
          @endforeach
        </div>
        <div class="FloatRight">
          {{ $posts->links() }}
        </div>
      </div>
    @else
      <script>
        window.location = "/user";
      </script>
    @endif
</body>

</html>
