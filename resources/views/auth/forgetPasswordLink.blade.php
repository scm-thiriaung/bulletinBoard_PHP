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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="links header headerBorderLine">
    <a href="{{ route('user.index') }}" class="FloatRight" style="font-size:20px;margin-right:19px;">Home</a>
  </div>
  <div class="container box" style="margin-top:11px;">
    <h3 align="center" class="title">Please Enter your new password</h3><br />
    @if ($errors->any())
      <div class="alert alert-danger alert-block">
        @foreach ($errors->all() as $error))
          <strong>{{ $error }}</strong><br>
        @endforeach
      </div>
    @endif
    @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
    @endif
    <div class="container py-3">
      <div class="row" style="margin-top:11px;">
        <div class="col-md-8 offset-md-2">
          <form method="POST" action="{{ route('reset.password.post') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
              <h2 for="old_password">E-Mail Address</h2>
              <input type="text" class="form-control" name="email" placeholder="Enter Email" style="font-size:14px;">
            </div>
            <div class="form-group">
              <h2 for="new_password">Password</h2>
              <input type="password" name="password" class="form-control" placeholder="Password"
                style="font-size:14px;">
            </div>
            <div class="form-group">
              <h2 for="confirm_password">Confirm Password</h2>
              <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password"
                style="font-size:14px;">
            </div>
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btnEdit" style="height:28px;width:86px;padding-bottom:28px;">Confirm
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
