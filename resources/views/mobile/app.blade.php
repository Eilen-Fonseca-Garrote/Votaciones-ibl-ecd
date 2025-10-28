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
    font-size: 2rem;
}

[type="radio"]:checked,
[type="radio"]:not(:checked) {
    position: absolute;
    left: -9999px;
}
[type="radio"]:checked + label,
[type="radio"]:not(:checked) + label
{
    position: relative;
    padding-left: 28px;
    cursor: pointer;
    line-height: 20px;
    display: inline-block;
    color: #666;
}
[type="radio"]:checked + label:before,
[type="radio"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 18px;
    height: 18px;
    border: 1px solid #ddd;
    border-radius: 100%;
    background: #fff;
}
[type="radio"]:checked + label:after,
[type="radio"]:not(:checked) + label:after {
    content: '';
    width: 12px;
    height: 12px;
    background: #6a0ce6;
    position: absolute;
    top: 4px;
    left: 4px;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
[type="radio"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
}
[type="radio"]:checked + label:after {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
}
.col-xs-12,.col-xs-6 {
    margin-bottom: 3rem;
}
</style>
@section('content')
<div class="container">
    <div class="row" style="margin-top: 1rem;margin-left: 1rem;margin-right: 1rem;">

            <div class="col-xs-4">
                @if ($web_view['order']>1)
                <a href="{{url('applications',[$web_view['order']-1])}}" class="btn btn-info"><span class="glyphicon glyphicon-fast-backward" aria-hidden="true"></span> Anterior </a>
                @endif
            </div>
            <div class="col-xs-4">
                <a href="javascript:;"
                onclick="var c=confirm('Desea asalir');if(c)window.location.href = '{{route('salir')}}';"
                class="btn btn-danger"> Salir <span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>
            </div>

        <div class="col-xs-4">
            <a href="{{url('applications',[$web_view['order']+1])}}" class="btn btn-info"> Siguiente <span class="glyphicon glyphicon-fast-forward" aria-hidden="true"></span></a>
        </div>

        <div class="col-xs-12">
           <div class="row">
            <div class="col-xs-12">
                <h4>Solicitar Servicio: <strong>{{session('vote')}}<strong></h4>
                <h3><strong>"{{$web_view['service']->name}}"</strong> (No. <strong>{{ $web_view['order'] }}</strong>)</h3>
            </div>
            <form method="POST" action="{{ route('app.store') }}"  role="form" enctype="multipart/form-data">
                @csrf
                @php
                $obj_post = $web_view['post'];
                @endphp
                 <div class="col-xs-12">
                    <input type="radio" id="test1" name="type" value="None" @if(!$obj_post)checked @endif>
                    <label for="test1">No aplicar</label>
                </div>
             @if ($web_view['service']->only!=2)

                        <div class="col-xs-12">
                            <input type="radio" id="test2" name="type"  value="Leader"  @if($obj_post && $obj_post->type=='Leader')checked @endif>
                            <label for="test2">Líder</label>
                        </div>
                        @if($web_view['service']->only!=1)
                            <div class="col-xs-12">
                                <input type="radio" id="test3" name="type" value="Support"@if($obj_post && $obj_post->type=='Support')checked @endif >
                                <label for="test3">Apoyo</label>
                            </div>
                        @endif
             @else
                <div class="col-xs-12">
                    <input type="radio" id="test3" name="type" value="Member" @if($obj_post && $obj_post->type=='Member')checked @endif >
                    <label for="test3">Miembro</label>
                </div>

             @endif

                <input type="hidden" name="order" value="{{$web_view['order']}}"/>
                <input type="hidden" name="service_id" value="{{$web_view['service']->id}}"/>
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary">Aplicar</button>
                </div>


            </form>
           </div>
        </div>


    </div>
  </div>
@endsection
@section('script')
<script>
      @if ($message = Session::get('success'))
        @if($message=="Ok")
            $.toastr.success('USTED SE HA POSTULADO!!', {position: 'right-bottom'});
        @elseif ($message=="End")
            $.toastr.warning('USTED  HA TERMINADO!!', {position: 'right-bottom'});
        @endif
      @endif
</script>
@endsection
