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
/*///////////////*/
[type="checkbox"]:checked,
[type="checkbox"]:not(:checked) {
    position: absolute;
    left: -9999px;
}
[type="checkbox"]:checked + label,
[type="checkbox"]:not(:checked) + label
{
    position: relative;
    padding-left: 28px;
    cursor: pointer;
    line-height: 20px;
    display: inline-block;
    color: #666;
}
[type="checkbox"]:checked + label:before,
[type="checkbox"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 18px;
    height: 18px;
    border: 1px solid #ddd;
    border-radius: 1%;
    background: #fff;
}
[type="checkbox"]:checked + label:after,
[type="checkbox"]:not(:checked) + label:after {
    content: '';
    width: 12px;
    height: 12px;
    background: brown;
    position: absolute;
    top: 4px;
    left: 4px;
    border-radius: 1%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
[type="checkbox"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
}
[type="checkbox"]:checked + label:after {
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
                <a href="{{url('voting',[$web_view['order']-1])}}" class="btn btn-info"><span class="glyphicon glyphicon-fast-backward" aria-hidden="true"></span> Anterior </a>
                @endif
            </div>
            <div class="col-xs-4">
                <a href="javascript:;"
                onclick="var c=confirm('Desea asalir');if(c)window.location.href = '{{route('salir')}}';"
                class="btn btn-danger"> Salir <span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>
            </div>

        <div class="col-xs-4">
            <a href="{{url('voting',[$web_view['order']+1])}}" class="btn btn-info"> Siguiente <span class="glyphicon glyphicon-fast-forward" aria-hidden="true"></span></a>
        </div>

        <div class="col-xs-12">
           <div class="row">
            <div class="col-xs-12">
                <h4><strong>({{session('vote')}}<strong>) Votar por: </h4>
                <h3><strong>"{{$web_view['service']->name}}"</strong></h3>
            </div>

            <form method="POST" action="{{ route('voting.store') }}"  role="form" enctype="multipart/form-data">
                @csrf
                @if ($web_view['service']->only=="2")
                        @foreach ( $web_view['post'] as $item)
                        @php
                        $listOfIds=false;
                        foreach ($web_view['list']as $key => $value) {
                            # code...
                            if($value->id_member==$item->id)
                                $listOfIds=true;

                        }
                      @endphp
                        <div class="col-xs-12">
                            <input type="checkbox" id="check-{{$item->id}}" name="idMember[]" value="{{$item->id}}"
                            @if( $listOfIds)checked @endif>
                            <label for="check-{{$item->id}}"  ondblclick="showPicture({{$item->id}})">{{$item->name}} {{$item->last_name}}</label>
                        </div>
                        @endforeach
                @else
                    @php
                        $obj_post = $web_view['post_select'];
                    @endphp
                    <div class="col-xs-12">
                        <input type="radio" id="test-0" name="id" value="0" @if(!$obj_post)checked @endif>
                        <label for="test-0">No Votar</label>
                    </div>
                    @foreach ( $web_view['post'] as $item)
                    @php
                    $listOfIds=false;
                    foreach ($web_view['list']as $key => $value) {
                        # code...
                        if($value->id_member==$item->id)
                            $listOfIds=true;

                    }
                    @endphp
                        <div class="col-xs-12">
                            <input type="radio" id="test-{{$item->id}}" name="id" value="{{$item->id}}"
                            @if( $listOfIds )checked @endif>
                            <label for="test-{{$item->id}}"  ondblclick="showPicture({{$item->id}})">{{$item->name}} {{$item->last_name}}</label>
                        </div>
                    @endforeach
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
<section  id="modal-section">
</section>
{{-- <script>

    function showPicture(id) {
        $.ajax(
            {url: "{{route('member.picture')}}",
            data: {id},
            method:'GET',
            success: function(result){
                $("#modal-section").html(result);
                $('#pictureModal').modal('show');
            },
        });
    }
</script> --}}
@endsection
@section('script')
<script>
      @if ($message = Session::get('success'))
            $.toastr.success('USTED  HA VOTADO!!', {position: 'right-bottom'});
      @endif

      function showPicture(id) {
        $.ajax(
            {url: "{{route('member.picture')}}",
            data: {id},
            method:'GET',
            success: function(result){
                $("#modal-section").html(result);
                $('#pictureModal').modal('show');
            },
        });
    }
</script>
@endsection


