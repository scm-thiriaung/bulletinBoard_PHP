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
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
    rel="stylesheet">
  </head>

  <body>
  <div class="links header headerBorderLine">
    <a href="{{ route('user.index') }}" class="FloatRight" style="font-size:20px;margin-right:19px;">Home</a>
  </div>
  <h3 align="center" class="title">User Register</h3><br />
  @if ($errors->any())
    <div class="alert alert-danger alert-block">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
  @endif
  <div class="container py-3">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <form method="POST" action="{{ route('registerUser') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <h2 for="email">Email</h2>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email"
              style="font-size:14px;">
          </div>
          <div class="form-group">
            <h2 for="password">Password</h2>
            <input type="password" name="password" class="form-control" placeholder="Password" style="font-size:14px;">
          </div>
          <div class="form-group">
            <h2 for="cpassword">Confirm Password</h2>
            <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password"
              style="font-size:14px;">
          </div>
          <button type="submit" class="btn btnEdit" name="action" value="register"
            style="height:28px;padding-bottom:28px;">Register User</button>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(function() {
      $('.date').datepicker();
    }); 
  </body>
</html>
