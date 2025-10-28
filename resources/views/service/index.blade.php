@extends('layouts.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.min.css') }}">
@endsection

@section('template_title')
    Servicio
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Service') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nuevo Servicio') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="service-table">
                                <thead class="thead">
                                    <tr>
                                        <th>Orden</th>

										<th>Nombre</th>
										<th>Único</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $i=>$service)
                                        <tr>
                                            <td>{{ $service->order }}</td>
											<td>{{ $service->name }}</td>
											<td>{{ $service->only==1?"SI":"NO" }}</td>


                                            <td>
                                                <form action="{{ route('services.destroy',$service->id) }}" method="POST" class="form">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('services.show',$service->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('services.edit',$service->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $services->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>
<script>
    $(document).ready( function () {
    $('#service-table').DataTable({
        language: {
        url: '/localisation/es-ES.json'
    }
    });
} );
 </script>
@endsection
