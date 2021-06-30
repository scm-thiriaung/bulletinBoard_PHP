@if (Auth::user()->status == Config::get('constant.admin'))
  <form action="{{ route('userSearch') }}" method="GET" class="FloatRight">
    {{ csrf_field() }}
    <input type="text" name="nameSearch" placeholder="Search UserName" class="txtSearch">
    <input type="text" name="emailSearch" placeholder="Search User Email" class="txtSearch">
    <button class="btnCommon btnLink btnDesign" type="submit" title="Search projects">Search</button>
  </form>
  <form action="{{ route('user.create') }} " method="get" class="FloatLeft">
    {{ csrf_field() }}
    <button class="btnCommon btnSubmit btnDesign" name="submit" value="create" disabled="disabled"
      style="width:123px;">Update User Info</button>
  </form>
@else
  <form action="{{ route('userSearch') }}" method="GET" class="FloatRight">
    {{ csrf_field() }}
    <input type="text" name="nameSearch" placeholder="Search UserName" class="txtSearch">
    <input type="text" name="emailSearch" placeholder="Search User Email" class="txtSearch">
    <button class="btnCommon btnLink btnDesign" type="submit" title="Search projects">Search</button>
  </form>
  <form action="{{ route('user.create') }} " method="get" class="FloatLeft">
    {{ csrf_field() }}
    <button class="btnCommon btnSubmit btnDesign" name="submit" value="create" style="width:123px;">Update User
      Info</button>
  </form>
@endif
