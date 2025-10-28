{{-- @extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired'))
<button> Empezar </button> --}}

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
    <div class="alert alert-success" style="">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif


            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <p>Ha expirado el Formulario (419)</p>
                <a href="{{url('/')}}" class="btn btn-success">IR AL INICIO</a>
              </div>
            </div>

    </div>
  </div>
@endsection
