@extends('layouts.layout')

@section('template_title')
    Nuevo Miembro
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection
@section('content')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Nuevo Miembro</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('members.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('member.form')

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Imagen</span>
                    </div>
                    <div class="card-body">
                        <img id="output_picture" class=""  style="width: 100%;height: 100%;" src="{{asset('img/default.png')}}">
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('script')
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script> --}}
<script>
      // https://parzibyte.me/blog
      const MAXIMO_TAMANIO_BYTES = 900000; // 1MB = 1 millón de bytes
    // Obtener referencia al elemento
    const $miInput = document.querySelector("#picture_member");
    $miInput.addEventListener("change", function () {


	// Validamos el primer archivo únicamente
	const archivo = this.files[0];
    var output = document.getElementById('output_picture');
	if (archivo.size > MAXIMO_TAMANIO_BYTES) {
		const tamanioEnMb = MAXIMO_TAMANIO_BYTES / 1000;
	// alert('El tamaño máximo es '+tamanioEnMb+' Kb');
     /*  $(document).Toasts('create', {
            class: 'bg-danger',
            title: 'Error !!',
            subtitle: 'Image loading',
            body: 'The max size is '+tamanioEnMb+' Kb. Please select  other one',
        })*/

		// Limpiar
		$miInput.value = "";
        output.src = '{{asset('img/default.jpg')}}';
	}
  else {
    output.style.display = 'block';
    output.src = URL.createObjectURL(this.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  }
});
    </script>
@endsection
