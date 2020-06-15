{!! Form::text('id', null, ['class' => 'form-control hidden-field']) !!}
<!-- Libelle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle', 'Libelle:') !!}
    {!! Form::text('libelle', null, ['class' => 'form-control']) !!}
    <strong class="error-label">
        @if($errors->has('libelle'))
            {!! $errors->first('libelle') !!}
        @endif
    </strong>
</div>
