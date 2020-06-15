{!! Form::text('id', null, ['class' => 'form-control hidden-field']) !!}
<!-- Theme Field -->
<div class="form-group col-sm-6">
    {!! Form::label('theme', 'Theme:') !!}
    {!! Form::text('theme', null, ['class' => 'form-control']) !!}
    <strong class="error-label">
        @if($errors->has('theme'))
            {!! $errors->first('theme') !!}
        @endif
    </strong>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('module_id', 'Domaine:') !!}
    <select class="form-control" name="module_id" required="required">
        @foreach($domaines as $domaine)
        <option value="{!! $domaine->id !!}">{{ $domaine->libelle }}</option>
        @endforeach
    </select>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'Etudiant:') !!}
    <select class="form-control" name="user_id" id='user_id' required="">
    </select>
    <strong class="error-label">
        @if($errors->has('user_id'))
            {!! $errors->first('user_id') !!}
        @endif
    </strong>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('rapport', 'Rapport:') !!}
    <input type="file" class="form-control" name="rapport" id="rapport"/>
    <strong class="error-label">
        @if($errors->has('rapport'))
            {!! $errors->first('rapport') !!}
        @endif
    </strong>
</div>

<!-- Annee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('annee_id', 'Membres du jury') !!}
    <select class="form-control select2" name="users[]" required="required" multiple="multiple">
        @foreach($profs as $prof)
            <option value="{!! $prof->id !!}">{{ $prof->name }}</option>
        @endforeach
    </select>
    <strong class="error-label">
        @if($errors->has('annee_id'))
            {!! $errors->first('annee_id') !!}
        @endif
    </strong>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('annee_id', 'Année académique:') !!}
    <select class="form-control" name="annee_id" required="required">
        @foreach($annees as $annee)
        <option value="{!! $annee->id !!}">{{ $annee->debut . '/' .$annee->fin }}</option>
        @endforeach
    </select>
    <strong class="error-label">
        @if($errors->has('annee_id'))
            {!! $errors->first('annee_id') !!}
        @endif
    </strong>
</div>
