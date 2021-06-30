<html>

<body>
  <div class="dropdowndemo FloatRight">
    <button name="dropdownbtn" class="dropdownbtn">{{ Auth::user()->email }}</button>
    <div class="dropdownlist-content">
      <a href="{{ route('changePassword') }}">change Password</a>
      <a href="{{ route('logout') }}">Logout</a>
    </div>
  </div>
  <a href="{{ url('userList') }}" class="FloatRight" style="font-size:20px;margin-right:19px;">User</a>
  <a href="{{ route('post.index') }}" class="FloatRight" style="font-size:20px;margin-right:19px;">Post</a>
  <a href="{{ route('user.index') }}" class="FloatRight" style="font-size:20px;margin-right:19px;">Home</a>
</body>

</html>
