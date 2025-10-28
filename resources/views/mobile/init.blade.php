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
    <h5>Iglesia Bautistas Libres ECD</h5>
    <div class="row">
        <div class="col-md-6">

                <a href="javascript:;"
                onclick="var c=confirm('Desea asalir');if(c)window.location.href = '{{route('salir')}}';"
                class="btn btn-danger"> Salir <span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>
           
        </div>
    </div>
    <div class="row" style="margin-top: 10rem;margin-left: 1rem;margin-right: 1rem;">
          <h2> Bienvenido(a) : </h2>
          <h2>{{$member_log->name." ".$member_log->last_name}}</h2><br>
          @if ( $view_data["post"]->value=='Y')
            <div class="col-xs-6">
                <a href="{{route('applications',[1])}}" class="btn btn-primary">Iniciar Postulaciones</a>
            </div>
          @endif
          @if ( $view_data["votes"]->value=='Y')
            <div class="col-xs-6">
                <a href="{{route('voting.order',[1])}}" class="btn btn-primary">Iniciar Votaciones</a>
            </div>
        @endif

    </div>
  </div>
@endsection
