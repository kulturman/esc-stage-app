{!! Form::text('id', null, ['class' => 'form-control hidden-field']) !!}
<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
    <strong class="error-label">
        @if($errors->has('nom'))
            {!! $errors->first('nom') !!}
        @endif
    </strong>
</div>

<!-- Contact Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact', 'Contact:') !!}
    {!! Form::text('contact', null, ['class' => 'form-control']) !!}
    <strong class="error-label">
        @if($errors->has('contact'))
            {!! $errors->first('contact') !!}
        @endif
    </strong>
</div>

<!-- Adresse Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adresse', 'Adresse:') !!}
    {!! Form::text('adresse', null, ['class' => 'form-control']) !!}
    <strong class="error-label">
        @if($errors->has('adresse'))
            {!! $errors->first('adresse') !!}
        @endif
    </strong>
</div>
