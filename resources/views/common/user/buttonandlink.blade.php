@if (Auth::user()->status == Config::get('constant.admin'))
  <a href="{{ route('user.show', $user->id) }}" id="btnDetail" class="btnDesign btnDetail btn-Link">Details</a>
  <a href="{{ route('user.edit', $user->id) }}" class="not-active btnDesign btnEdit btn-Link">Edit User</a>
  <form action="{{ route('user.destroy', $user->id) }}" method="post" class="FloatRight frmDelete">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit" class="btnDelete btn-Link btnDesign">Delete</button>
  </form>
@else
  <a href="{{ route('user.show', $user->id) }}" id="btnDetail" class="btnDesign btnDetail btn-Link">Details</a>
  <a href="{{ route('user.edit', $user->id) }}" class="btnDesign btnEdit btn-Link">Edit User</a>
@endif
