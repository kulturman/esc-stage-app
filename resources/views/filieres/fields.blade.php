{!! Form::text('id', null, ['class' => 'form-control hidden-field']) !!}
<!-- Nom Filiere Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom_filiere', 'Nom Filiere:') !!}
    {!! Form::text('nom_filiere', null, ['class' => 'form-control']) !!}
    <strong class="error-label">
        @if($errors->has('nom_filiere'))
            {!! $errors->first('nom_filiere') !!}
        @endif
    </strong>
</div>
