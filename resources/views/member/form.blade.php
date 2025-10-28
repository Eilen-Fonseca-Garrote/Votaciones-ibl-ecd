<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('ci') }}
            {{ Form::text('ci', $member->ci, ['class' => 'form-control' . ($errors->has('ci') ? ' is-invalid' : ''), 'placeholder' => 'Ci']) }}
            {!! $errors->first('ci', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mt-3" >
            {{ Form::label('name',"Nombre") }}
            {{ Form::text('name', $member->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group  mt-3">
            {{ Form::label('last_name','Apellidos') }}
            {{ Form::text('last_name', $member->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Last Name']) }}
            {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mt-3">
            {{ Form::label('address','Dirección') }}
            {{ Form::text('address', $member->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mt-3">
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('member_from','Miembro desde:') }}
                    {{ Form::date('member_from',isset($member->member_from)? $member->member_from->format('Y-m-d'):'', ['class' => 'form-control' . ($errors->has('member_from') ? ' is-invalid' : ''), 'placeholder' => 'Miembro desde']) }}
                    {!! $errors->first('member_from', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-md-6">
                    {{ Form::label('christening_date','Fecha de Bautizo') }}
                    {{ Form::date('christening_date', isset($member->christening_date)?$member->christening_date->format('Y-m-d'):'', ['class' => 'form-control' . ($errors->has('christening_date') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de Bautizo']) }}
                    {!! $errors->first('christening_date', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

        </div>
        <div class="form-group mt-3">
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('genre','Género') }}
                    <div class="form-group  mb-5">
                        {!! Form::select('genre', ["M"=>"Hombre","F"=>"Mujer"], $member->genre, ['class'=>'form-control']) !!}
                    </div>
                    {{-- <select name="genre" id="genre" class='form-control' >
                        <option value="M">Hombre</option>
                        <option value="F">Mujer</option>
                       </select> --}}

                </div>
                @php
                    $study=false;
                    if(isset($member->qualific))
                    {
                        if($member->qualific){
                            $study=true;
                        }
                    }
                @endphp
                <div class="col-md-6 mt-4">
                    <div class="icheck-primary d-inline ">
                        <input type="checkbox" id="radioPrimary" class="mt-5" name="qualific" @if ($study) checked @endif>
                        <label for="radioPrimary"> Estudios Teológicos
                        </label>
                    </div>
                </div>
            </div>


        </div>
        <div class="form-group mt-3">
            <label class="form-label" for="picture_member">Foto de miembro</label>
            <input type="file" class="form-control" id="picture_member" name="file"/>
        </div>
        <div class="form-group mt-3">
            <label class="form-label" for="picture_member">Observaciones</label>
            <textarea class="form-control" id="picture_member" name="observations">
                {{old('observations')?? $member->observations}}
            </textarea>
        </div>

    </div>
    <div class="box-footer mt20 mt-3">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
