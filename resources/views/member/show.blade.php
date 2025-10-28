@extends('layouts.layout')

@section('template_title')
    {{ $member->name ?? 'Show Member' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Member</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('members.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Ci:</strong>
                            {{ $member->ci }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $member->name }}
                        </div>
                        <div class="form-group">
                            <strong>Last Name:</strong>
                            {{ $member->last_name }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $member->address }}
                        </div>
                        <div class="form-group">
                            <strong>Member From:</strong>
                            {{ $member->member_from }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
