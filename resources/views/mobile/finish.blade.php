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
        {{-- <form method="POST" action="{{route('finish.store')}}" class="form-group">
            @csrf --}}

            <div class="row">
                <div class="col-md-12">
                    <h2>Usted puede finalizar la votacion o volverla a revisar</h2>
                    <p>Selecciones una opcion</p>
                </div>
            </div>
            <div class="col-md-6" style="margin-bottom: 3rem;  font-size: 3rem;">
             <a class="btn btn-info" href="{{route('voting.order',[1])}}" >Revisar votación</a>
            </div>
            <div class="col-md-6">
                <a href="javascript:;"
                onclick="var c=confirm('Desea Terminar la votación?');if(c)window.location.href = '{{route('finish.store',[1])}}';"
                 class="btn btn-success" >Terminar votación</a>
            </div>
            {{-- <div class="form-group">
                <label for="exampleInputEmail1">Fecha Nacimiento en CI</label>
                <input type="number" class="form-control" name="name" id="name" placeholder="Los 6 primeros números" required  minlength="6" maxlength="11">
              </div>


            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Buscar Miembro..</button>
              </div>
            </div> --}}
          {{-- </form> --}}
    </div>
  </div>
@endsection
