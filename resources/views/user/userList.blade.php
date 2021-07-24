<!DOCTYPE html>
<html>

<head>
  <title>Simple Laravel Form</title>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/user/user.css') }}">
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
  <h3 align="center" class="title">UserList</h3><br />
  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif
  <div class="container py-3" id="navbarSupportedContent">
    @include('common.user.header_button')
    <br>
    <br>
    @if (isset(Auth::user()->email))
      <div class="container py-3">
        <div class="row" style="margin-top:11px;">
          @foreach ($users as $user)
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h4>{{ $user->name }}</h4>
                </div>
                <div class="card-body">
                  @include('common.user.buttonandlink')
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="FloatRight">
          {{ $users->links() }}
        </div>
      </div>
    @else
      <script>
        window.location = "/user";
      </script>
    @endif
</body>

</html>
