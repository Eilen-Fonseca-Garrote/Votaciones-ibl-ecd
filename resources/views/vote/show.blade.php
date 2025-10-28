@extends('layouts.layout')

@section('template_title')
    {{ $vote->name ?? 'Show Vote' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Vote</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('votes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Period:</strong>
                            {{ $vote->period }}
                        </div>
                        <div class="form-group">
                            <strong>Start At:</strong>
                            {{ $vote->start_at }}
                        </div>

                        <div class="row">
                            <hr>
                            <h3>Reportes</h3>
                            <div class="col-md-12 mb-3">
                                <a  class="btn btn-success" href="{{route('vote.list',[$vote->id])}}" >Reporte de Postulaciones</a>
                            </div>
                            <div class="col-md-12 mb-3">
                                <a  class="btn btn-success" href="{{route('donut.index',[$vote->id])}}" >Reporte de Grafico de pastel de participantes</a>
                            </div>
                            <div class="col-md-12">
                                <a  class="btn btn-success" href="{{route('vote.list.table',[$vote->id])}}" >Resultados de las votaciones</a>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
