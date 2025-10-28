@extends('layouts.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.min.css') }}">
@endsection

@section('template_title')
    Postulaciones del periodo: {{$periodo}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                           <h2> <span class="badge bg-info text-dark">Votaciones del periodo: {{$periodo}}</span></h2>


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
                            <table class="table table-striped table-hover" id="member-table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Ci</th>
										<th>Nombre</th>
										<th>Apellidos</th>
										<th>Servicio</th>
										<th>Aplica como</th>
                                        <th>Acciones</th>

                                        {{-- <th></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($members as $i=>$member)
                                      @php
                                      $type="";
                                          switch ($member->type) {
                                            case 'Leader':
                                                $type ="<span class='badge bg-warning'>Lider</span>";
                                                break;
                                            case 'Support':
                                                $type ="<span class='badge bg-info text-dark'>Apoyo</span>";
                                                break;
                                            case 'Member':
                                                $type ="<span class='badge bg-success'>Miembro</span>";
                                                break;

                                            default:
                                                    $type ="<span class='badge bg-alert'>Sin categoria</span>";
                                                break;
                                          }
                                      @endphp
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $member->ci }}</td>
											<td>{{ $member->name }}</td>
											<td>{{ $member->last_name }}</td>
											<td>{{ $member->s_name }}</td>
											<td>{!! $type !!}</td>

                                            <td>
                                                <form action="{{ route('postulates.destroy',$member->post_id) }}" method="POST" class="form">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('members.show',$member->id) }}"><i class="fa fa-fw fa-eye"></i> </a> --}}
                                                    @csrf
                                                    @method('DELETE')
                                                     <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
                                                     @if (($member->type=="Support" || $member->type=="Leader")   && $member->only==2)
                                                     <a class="btn btn-sm btn-success" href="{{ route('convert.member',$member->post_id) }}"><i class="fa fa-fw fa-edit"></i> Miembro</a>
                                                    @endif
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
<script>
    $(document).ready( function () {
    $('#member-table').DataTable({
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
