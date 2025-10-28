@extends('layouts.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.min.css') }}">
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
                           <h2> <span class="badge bg-info text-dark">Logs de la app</span></h2>


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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="log-table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Accion</th>
										<th>Descripcion</th>
                                        <th>Fecha</th>
                                        {{-- <th></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs as $i=>$log)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $log->action }}</td>
                                            <td>{{ $log->description }}</td>
                                            <td>{{ $log->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $logs->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>
<script>
    $(document).ready( function () {
    $('#log-table').DataTable({
        language: {
        url: '/localisation/es-ES.json'
        },
        buttons: [
        'pdf'
        ]
    });
} );
 </script>
@endsection
