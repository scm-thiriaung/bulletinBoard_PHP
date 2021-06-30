@if (Auth::user()->status == Config::get('constant.admin'))
  <form action="{{ route('findPost') }}" method="GET" class="FloatRight">
    {{ csrf_field() }}
    <input type="text" name="search" placeholder="Search Post" class="txtSearch">
    <button class="btnCommon btnLink btnDesign" type="submit" title="Search Projects">Search</button>
  </form>
  <form action="{{ route('postMethod') }}" method="post" class="FloatLeft">
    {{ csrf_field() }}
    <button class="btnCommon btnSubmit btnDesign" name="submit" value="create" disabled="disabled">Create
      Post</button>&nbsp;&nbsp;
    <button class="btnCommon btnSubmit btnDesign" name="submit" value="download"
      disabled="disabled">Download</button>&nbsp;&nbsp;
  </form>
  <form id="excel-csv-import-form" method="POST" action="{{ route('importExcel') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <button class="btnCommon btnSubmit btnDesign" name="submit" value="import"
      disabled="disabled">Import</button>&nbsp;&nbsp;&nbsp;
    <input type="file" name="file" placeholder="Choose file" class="FloatRight" style="padding-top:5px;" disabled>
  </form>
@else
  <form action="{{ route('findPost') }}" method="GET" class="FloatRight">
    {{ csrf_field() }}
    <input type="text" name="search" placeholder="Search Post" class="txtSearch">
    <button class="btnCommon btnLink btnDesign" type="submit" title="Search Projects">Search</button>
  </form>
  <form action="{{ route('postMethod') }}" method="post" class="FloatLeft">
    {{ csrf_field() }}
    <button class="btnCommon btnSubmit btnDesign" name="submit" value="create">Create Post</button>&nbsp;&nbsp;
    <button class="btnCommon btnSubmit btnDesign" name="submit" value="download">Download</button>&nbsp;&nbsp;
  </form>
  <form id="excel-csv-import-form" method="POST" action="{{ route('importExcel') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <button class="btnCommon btnSubmit btnDesign" name="submit" value="import">Import</button>&nbsp;&nbsp;&nbsp;
    <input type="file" name="file" placeholder="Choose file" class="FloatRight" style="padding-top:5px;">
  </form>
@endif
