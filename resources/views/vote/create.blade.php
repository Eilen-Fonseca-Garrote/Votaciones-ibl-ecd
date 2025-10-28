@extends('layouts.layout')

@section('template_title')
    Create Vote
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Vote</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('votes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('vote.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
