<div class="row">
    <div class="col-md-6">
        <div class="box box-info padding-1">
            <div class="box-body">

                <div class="form-group">
                    {{ Form::label('name',"Nombre") }}
                    {{ Form::text('name', $service->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group mt-5">
                     @php
                      /* $only=false;
                        if(isset($service->only))
                        {
                            if($service->only){
                                $only=true;
                            }
                        }*/
                        $list =[0=>'Lider y Apollo',1=>'Solo Lider',2=>'Miembros'];
                @endphp
                    {{-- <div class="icheck-primary d-inline ">
                        <input type="checkbox" id="radioPrimary" class="mt-5" name="only" @if ($only) checked @endif>
                        <label for="radioPrimary"> Servicio Único
                        </label>
                    </div> --}}
                    <div class="form-group mt-3 mb-5">
                        {!! Form::select('only', $list, $service->only, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group mt-3 mb-5">
                    {{ Form::label('order','Orden') }}
                    {{ Form::number('order', $service->order, ['class' => 'form-control' . ($errors->has('order') ? ' is-invalid' : ''), 'placeholder' => 'Order']) }}
                    {!! $errors->first('order', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
            <div class="box-footer mt20">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
</div>
</div>
