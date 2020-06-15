{!! Form::text('id', null, ['class' => 'form-control hidden-field']) !!}
<!-- Debut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('debut', 'Debut:') !!}
    {!! Form::number('debut', null, ['class' => 'form-control']) !!}
    <strong class="error-label">
        @if($errors->has('debut'))
            {!! $errors->first('debut') !!}
        @endif
    </strong>
</div>

<!-- Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fin', 'Fin:') !!}
    {!! Form::number('fin', null, ['class' => 'form-control']) !!}
    <strong class="error-label">
        @if($errors->has('fin'))
            {!! $errors->first('fin') !!}
        @endif
    </strong>
</div>
