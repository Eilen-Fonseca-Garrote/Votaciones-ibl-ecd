@extends('layouts.layout')

@section('template_title')
    Vote
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Vote') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('votes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nueva Votación') }}
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Activo</th>

										<th>Periodo</th>
										<th>Fecha de Inicio</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($votes as $vote)
                                        <tr>
                                            <td>
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" data-id ={{$vote->id}} id="radioPrimary{{$vote->id}}" name="r1" @if ( $vote->active==1)checked @endif>
                                                    <label for="radioPrimary{{$vote->id}}">
                                                    </label>
                                                </div>
                                               </td>

											<td>{{ $vote->period }}</td>
											<td>{{ $vote->start_at }}</td>

                                            <td>
                                                <form action="{{ route('votes.destroy',$vote->id) }}" method="POST" class="form">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('votes.show',$vote->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('votes.edit',$vote->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
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
                {!! $votes->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
      $(function() {
        $('input:checkbox[name="r1"]').change(function() {
          var value = $(this).prop('checked')?1:0;
           var id =$(this).attr('data-id');
           //var market =$('#hdd-market').val();

           window.location.href = "{{route('main')}}/vote/"+id;

        });
    });
</script>
@endsection
