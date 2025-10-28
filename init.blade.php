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
          <h2> Bienvenidobb(a) : {{$member_log->name." ".$member_log->last_name}}</h2>

            <div class="col-xs-12">
                <a href="{{route('applications',[1])}}" class="btn btn-primary">Iniciar Postulaciones</a>
            </div>


    </div>
  </div>
@endsection
