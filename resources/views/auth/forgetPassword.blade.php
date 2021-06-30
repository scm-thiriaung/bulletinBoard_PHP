<!DOCTYPE html>
<html>

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
    <h3 align="center" class="title">Please Confirm Email</h3><br />
    @if (count($errors) > 0)
      <div class="alert alert-danger alert-block">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form method="post" action="{{ route('forget.password.post') }}">
      {{ csrf_field() }}
      <div class="form-group">
        <h2>Enter Email</h2>
        <input type="email" name="email" placeholder="Enter Email" class="form-control" style="font-size:14px;" />
      </div>
      <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btnEdit" style="height:28px;width:204px;padding-bottom:28px;">
          Send Password Reset Link
        </button>
      </div>
    </form>
  </div>
</body>

</html>
