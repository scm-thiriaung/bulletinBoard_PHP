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
    @if (isset(Auth::user()->email))
      @include('common.header')
    @endif
  </div>
  <br>
  <br>
  <h3 align="center" class="title">User Create</h3><br />
  @if ($errors->any())
    <div class="alert alert-danger alert-block">
      @foreach ($errors->all() as $error))
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $error }}</strong><br>
      @endforeach
    </div>
  @endif
  <div class="container py-3">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <h2 for="name">Name</h2>
            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}"
              placeholder="User Name" style="font-size:14px;">
          </div>
          <div class="form-group">
            <h2 for="email">Email</h2>
            <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="Email"
              style="font-size:14px;" readonly="true">
          </div>
          <div class="form-group">
            <h2 for="password">Password</h2>
            <input type="password" name="password" class="form-control" placeholder="Password" style="font-size:14px;"
              value="{{ Auth::user()->password }}" readonly="true">
          </div>
          <div class="form-group">
            @if (Auth::user()->status == 1)
              <input type="radio" name="status" value="1" checked>&nbsp;
              <label for="status" style="font-size:14px;">Admin</label>&nbsp;&nbsp;
              <input type="radio" name="status" value="0">&nbsp;
              <label for="status" style="font-size:14px;">User</label>
            @else
              <input type="radio" name="status" value="1">&nbsp;
              <label for="status" style="font-size:14px;">Admin</label>&nbsp;&nbsp;
              <input type="radio" name="status" value="0" checked>&nbsp;
              <label for="status" style="font-size:14px;">User</label>
            @endif
          </div>
          <div class="form-group">
            <h2 for="dob">Date of Birth</h2>
            <input type="text" name="dob" class="form-control date" value="{{ Auth::user()->dob }}"
              placeholder="Date of Birth" style="font-size:14px;">
          </div>
          <button type="submit" class="btn btnEdit" name="action" value="new"
            style="height:28px;padding-bottom:28px;">Update User Info</button>&nbsp;&nbsp;&nbsp;
          <a href="{{ route('userList') }}" class="btn btnBack my-2 my-sm-0" style="padding-bottom:28px;">Back to
            List</a>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(function() {
      $('.date').datepicker();
    });
  </script>
</body>

</html>
