@extends('layouts.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables/buttons.dataTables.min.css') }}">
@endsection

@section('template_title')
    Member
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Miembro') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('members.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Registrar nuevo Miembro') }}
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
                            <table class="table table-striped table-hover" id="member-table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Ci</th>
										<th>Nombre</th>
										<th>Apellidos</th>
										<th>Dirección</th>
										<th>Miembro desde</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($members as $i=>$member)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $member->ci }}</td>
											<td>{{ $member->name }}</td>
											<td>{{ $member->last_name }}</td>
											<td>{{ $member->address }}</td>
											<td>{{ $member->member_from }}</td>

                                            <td>
                                                <form action="{{ route('members.destroy',$member->id) }}" method="POST" class="form">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('members.show',$member->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('members.edit',$member->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button> --}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $members->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script>
    $(document).ready( function () {
    $('#member-table').DataTable({
        language: {
        url: '/localisation/es-ES.json'
        }

    });
} );
 </script>
@endsection
