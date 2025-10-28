 <div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group mb-5">
            <div class="icheck-primary d-inline ">
                <input type="checkbox" id="radioPrimary" class="mt-5" name="post" @if ( $view_data["post"]->value=='Y') checked @endif>
                <label for="radioPrimary"> Activar Postulaciones
                </label>
            </div>
        </div>
        <div class="form-group mb-5">
            <div class="icheck-primary d-inline ">
                <input type="checkbox" id="radiovote" class="mt-5" name="vot" @if ($view_data["votes"]->value=='Y') checked @endif>
                <label for="radiovote"> Activar Votaciones
                </label>
            </div>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
<!-- Default inline 1-->
