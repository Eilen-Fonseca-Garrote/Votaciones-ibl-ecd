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

                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                          <h2>  Perido de votación: <strong>{{ $viewData['vote']->period}}</strong></h2>
                        </div>
                        <div class="col-md-12">
                            <p>El total de miembros registrado es: <strong>{{$viewData['member_c']}}</strong></p>
                        </div>
                        <div class="col-md-12">
                            <p>Ejercieron la votación: <strong>{{$viewData['voting']->total}}</strong> {!! $viewData['voting']->total<=1?"Miembro":"Miembros" !!}</p>
                        </div>
                        <div class="col-md-6">
                            {{-- <div id="chart-div"></div>
                            @donutchart('IMDB', 'chart-div') --}}
                            <div id="chart">
                            </div>
                        </div>
                     </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{asset('plugins/Chart/apexcharts.js')}}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
<script>
      $(function() {

    });
let total ={{$viewData['member_c']}};
let votaron={{$viewData['voting']->total}};
    var options = {
  chart: {
    type: 'donut'
  },
  series: [votaron, (total-votaron)],
  labels: ['Votaron', 'No votaron']

}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();

</script>
@endsection
