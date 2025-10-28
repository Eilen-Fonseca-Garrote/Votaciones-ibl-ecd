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
    <div class="row" style="margin-top: 20rem;margin-left: 1rem;margin-right: 1rem;">
        @if (\Session::has('success'))
    <div class="alert alert-success" style="font-weight: 400px;font-size: 2rem;color: red;">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
        <form method="POST" action="{{route('portal')}}" class="form-group">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Fecha Nacimiento en CI</label>
                <input type="number" class="form-control" name="name" id="name" placeholder="Los 6 primeros números" required  minlength="6" maxlength="11">
              </div>


            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Buscar Miembro..</button>
              </div>
            </div>
          </form>
    </div>
  </div>
@endsection
