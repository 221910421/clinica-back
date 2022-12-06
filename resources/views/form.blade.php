
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-field">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $medicamento->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-field">
            {{ Form::label('clasificacion') }}
            {{ Form::text('clasificacion', $medicamento->clasificacion, ['class' => 'form-control' . ($errors->has('clasificacion') ? ' is-invalid' : ''), 'placeholder' => 'Clasificacion']) }}
            {!! $errors->first('clasificacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-field">
            {{ Form::label('presentacion') }}
            {{ Form::text('presentacion', $medicamento->presentacion, ['class' => 'form-control' . ($errors->has('presentacion') ? ' is-invalid' : ''), 'placeholder' => 'Presentación']) }}
            {!! $errors->first('presentacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-field">
            {{ Form::label('dosis') }}
            {{ Form::text('dosis', $medicamento->dosis, ['class' => 'form-control' . ($errors->has('dosis') ? ' is-invalid' : ''), 'placeholder' => 'Dosis']) }}
            {!! $errors->first('dosis', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Crear</button>
    </div>
</div>