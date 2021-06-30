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
    @if (isset(Auth::user()->email))
      @include('common.header')
    @endif
  </div>
  <h3 align="center" class="title">Change Password</h3><br />
  @if ($errors->any())
    <div class="alert alert-danger alert-block">
      @foreach ($errors->all() as $error))
        <button type="button" class="close" data-dismiss="alert">×</button>
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
        <form method="POST" action="{{ route('updatePassword') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <h2 for="old_password">Old Password</h2>
            <input type="password" name="old_password" class="form-control" placeholder="Old Password"
              style="font-size:14px;">
          </div>
          <div class="form-group">
            <h2 for="new_password">New Password</h2>
            <input type="password" name="new_password" class="form-control" placeholder="New Password"
              style="font-size:14px;">
          </div>
          <div class="form-group">
            <h2 for="confirm_password">Confirm Password</h2>
            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password"
              style="font-size:14px;">
          </div>
          <button type="submit" class="btn btnEdit" style="height:28px;padding-bottom:28px;">Change
            Password</button>&nbsp;&nbsp;&nbsp;
          <a href="{{ route('userList') }}" class="btn btnBack my-2 my-sm-0" style="padding-bottom:28px;">Back to
            List</a>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
