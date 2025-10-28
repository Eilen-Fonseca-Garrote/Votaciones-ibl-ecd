@extends('layouts.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endsection

@section('template_title')
   Logs
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                           <h2> <span class="badge bg-info text-dark">Listado de votaciones por servicio</span></h2>

                            <div>
                              {!! Form::select('servce', $viewData['services'], null, ["id" =>"servicio"]) !!}
                            </div>
                             {{-- <div class="float-right">
                                <a href="{{ route('members.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Registrar nuevo Miembro') }}
                                </a>
                              </div> --}}
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">



                    </div>
                </div>
                {{-- {!! $logs->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(document).ready( function () {
        $('#servicio').select2();

        $('#servicio').on('change',function(e){
            // alert(e.target.value)
            result(e.target.value)
        })
    //alert($('#servicio').val())
    result($('#servicio').val())
    $('#log-table').DataTable({
        language: {
        url: '/localisation/es-ES.json'
        },
        buttons: [
        'pdf'
        ]
    });
} );

// cargar resultados
function result(id)
{
    $.ajax(
        {
        url: "{{route('main')}}/result-votes/"+id,
         type:'GET',
         success: function(result){
               console.log(result)
               $('.card-body').html(result);
            }}
        );
}
 </script>
@endsection
