@if (Auth::user()->status == Config::get('constant.admin'))
  <a href="{{ route('post.show', $post->id) }}" id="btnDetail" class="btnDesign btnDetail btn-Link">Details</a>
  <a href="{{ route('post.edit', $post->id) }}" class="not-active btnDesign btnEdit btn-Link">Edit Post</a>
  <form action="{{ route('post.destroy', $post->id) }}" method="post" class="FloatRight frmDelete">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit" class="btnDelete btn-Link btnDesign" disabled="disabled">Delete</button>
  </form>
@else
  @if (Auth::user()->email != $post->email)
    <a href="{{ route('post.show', $post->id) }}" id="btnDetail" class="btnDesign btnDetail btn-Link">Details</a>
    <a href="{{ route('post.edit', $post->id) }}" class="not-active btnDesign btnEdit btn-Link">Edit Post</a>
    <form action="{{ route('post.destroy', $post->id) }}" method="post" class="FloatRight frmDelete">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btnDelete btn-Link btnDesign" disabled="disabled">Delete</button>
    </form>
  @else
    <a href="{{ route('post.show', $post->id) }}" id="btnDetail" class="btnDesign btnDetail btn-Link">Details</a>
    <a href="{{ route('post.edit', $post->id) }}" class="btnDesign btnEdit btn-Link">Edit Post</a>
    <form action="{{ route('post.destroy', $post->id) }}" method="post" class="FloatRight frmDelete">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btnDelete btn-Link btnDesign">Delete</button>
    </form>
  @endif
@endif
