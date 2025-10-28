@extends('layouts.layout')

@section('template_title')
    Configuraciones
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection
@section('content')
    <section class="content container-fluid">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Configuraciones</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('configs.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('config.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
