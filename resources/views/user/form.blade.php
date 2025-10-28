<div class="row">
    <div class="col-md-6">
        <div class="box box-info padding-1">
            <div class="box-body">

                <div class="form-group mt-3">
                    {{ Form::label('name','Nombre') }}
                    {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group mt-3">
                    {{ Form::label('email','Correo-E') }}
                    {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group mt-3">
                    {{ Form::label('password') }}
                    {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Password']) }}
                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
            <div class="box-footer mt20 mt-5">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
</div>
</div>
