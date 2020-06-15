{!! Form::text('id', null, ['class' => 'form-control hidden-field']) !!}
@if(isset($preInscription) && $preInscription)
<input value="{!! $preInscription->id !!}" type="text" name="preinscription" class="hidden-field"/>
@endif
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nom & prénom(s):') !!}
    {!! Form::text('name', $preInscription ? $preInscription->nom : null, ['class' => 'form-control']) !!}
    <strong class="error-label">
        @if($errors->has('name'))
        {!! $errors->first('name') !!}
        @endif
    </strong>
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', $preInscription ? $preInscription->email : null, ['class' => 'form-control']) !!}
    <strong class="error-label">
        @if($errors->has('email'))
        {!! $errors->first('email') !!}
        @endif
    </strong>
</div>

<!-- Date Naissance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_naissance', 'Date Naissance:') !!}
    {!! Form::date('date_naissance', null, ['class' => 'form-control','id'=>'date_naissance']) !!}
    <strong class="error-label">
        @if($errors->has('date_naissance'))
        {!! $errors->first('date_naissance') !!}
        @endif
    </strong>
</div>

<!-- Lieu Naissance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lieu_naissance', 'Lieu Naissance:') !!}
    {!! Form::text('lieu_naissance', null, ['class' => 'form-control','id'=>'lieu_naissance']) !!}
    <strong class="error-label">
        @if($errors->has('lieu_naissance'))
        {!! $errors->first('lieu_naissance') !!}
        @endif
    </strong>
</div>
<!-- Genre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('genre', 'Genre:') !!}
    <select class="form-control" name="genre">
        <option
            value="masculin"
            @if (isset($student) and $student->genre=='masculin')
            selected @endif()>Masculin</option>
        <option value="feminin"
                @if (isset($student) and $student->genre=='feminin')
            selected @endif()>
            Féminin</option>
    </select>
</div>

<!-- Contact Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact', 'Contact:') !!}
    {!! Form::text('contact', $preInscription ? $preInscription->contact : null, ['class' => 'form-control']) !!}
    <strong class="error-label">
        @if($errors->has('contact'))
        {!! $errors->first('contact') !!}
        @endif
    </strong>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('matricule', 'Matricule:') !!}
    {!! Form::text('matricule', null, ['class' => 'form-control']) !!}
    <strong class="error-label">
        @if($errors->has('matricule'))
        {!! $errors->first('matricule') !!}
        @endif
    </strong>
</div>

<!-- Role Id Field -->
@if(!isset($role))
    <div class="form-group col-sm-6">
        {!! Form::label('role_id', 'Role:') !!}
        <select id="role_id" name="role_id" class="form-control">
            @foreach($roles as $role)
            <option
                @if(isset($user) && $user->role_id == $role->id)
                selected
                @endif
                value="{!! $role->id !!}">
                {!! $role->label !!}
        </option>
        @endforeach
    </select>
    <strong class="error-label">
        @if($errors->has('role_id'))
            {!! $errors->first('role_id') !!}
        @endif
    </strong>
    </div>
@else
<input type="text" name="role_id" value="{!! $role !!}" style="display: none"/>
@endif
