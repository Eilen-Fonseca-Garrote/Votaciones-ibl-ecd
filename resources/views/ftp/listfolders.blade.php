@extends('layouts.mobile')

@section('template_title')
    Member
@endsection
<style>
input {
    height: 5rem !important;
}
button {
    height: 4rem !important;
}
label {
    font-size: 3rem;
}
</style>
@section('content')
<div class="container">
    @foreach( $dirNames as $dirName)
    <div class="col-lg-3 col-md-3 col-sm-4 align-center">
        <a href="get-files/{{$dirName}}" class="btn btn-light folder-wrap" role="button">
            <span class="glyphicon glyphicon-folder-open folderIcons"></span>
            {{ $dirName }}
        </a>
    </div>
@endforeach

  </div>
  @foreach( $filesArr as $fileArr)
    <div class="col-lg-2 col-md-3 col-sm-4">
        <a href="{{ $fileArr['fileUrl'] }}" class="waves-effect waves-light btn green folder-wrap">
            <span class="glyphicon glyphicon-file folderIcons"></span>
            <span class="file-name">{{ $fileArr['fileName'] }}</span>
        </a>
    </div>
@endforeach
@endsection
