@extends('layouts.mobile')

@section('template_title')
    Member
@endsection
<style>
input {
    height: 5rem !important;
}
button {
    height: 4rem !important;
}
label {
    font-size: 3rem;
}
</style>
@section('content')
<div class="container">
    <div class="row" style="margin-top: 15rem;">
        <div class="col-md-12">
            <h3>Seleccione su nombre:</h3>
        </div>
    </div>
    <div class="row" style="margin-top: 5rem;margin-left: 1rem;margin-right: 1rem;">
        <table class="table table-condensed">
            @foreach ( $members as $member)
            <tr class="info">

                    <td style="height: 5rem;">
                        <a href="{{route('init_mob',[$member->id])}}">
                            {{$member->name."  ". $member->last_name}}
                        </a>
                    </td>

            </tr>
            @endforeach

          </table>
    </div>
  </div>
@endsection
