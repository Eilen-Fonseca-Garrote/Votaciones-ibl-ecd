<div class="row">
    <div class="col-md-6">
        <div class="box box-info padding-1">
            <div class="box-body">

                <div class="form-group  mt-3">
                    {{ Form::label('period') }}
                    {{ Form::text('period', $vote->period, ['class' => 'form-control' . ($errors->has('period') ? ' is-invalid' : ''), 'placeholder' => 'Period']) }}
                    {!! $errors->first('period', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group  mt-3">
                    {{ Form::label('start_at') }}
                    {{ Form::date('start_at', $vote->start_at, ['class' => 'form-control' . ($errors->has('start_at') ? ' is-invalid' : ''), 'placeholder' => 'Start At']) }}
                    {!! $errors->first('start_at', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
            <div class="box-footer mt20  mt-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>


    </div>
</div>
