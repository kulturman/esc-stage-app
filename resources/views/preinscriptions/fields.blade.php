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

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    <strong class="error-label">
        @if($errors->has('email'))
            {!! $errors->first('email') !!}
        @endif
    </strong>
</div>

<!-- Module Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('module_id', 'Domaine:') !!}
    <select class="form-control" name="module_id">
        <option value=""></option>
        @foreach($domaines as $domaine)
        <option value="{!! $domaine->id !!}">
            {{ $domaine->libelle }}
        </option>
        @endforeach
    </select>
    <strong class="error-label">
        @if($errors->has('module_id'))
            {!! $errors->first('module_id') !!}
        @endif
    </strong>
</div>
