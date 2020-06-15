<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Email Verified At Field -->
<div class="form-group">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $user->email_verified_at }}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $user->password }}</p>
</div>

<!-- Remember Token Field -->
<div class="form-group">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{{ $user->remember_token }}</p>
</div>

<!-- Date Naissance Field -->
<div class="form-group">
    {!! Form::label('date_naissance', 'Date Naissance:') !!}
    <p>{{ $user->date_naissance }}</p>
</div>

<!-- Lieu Naissance Field -->
<div class="form-group">
    {!! Form::label('lieu_naissance', 'Lieu Naissance:') !!}
    <p>{{ $user->lieu_naissance }}</p>
</div>

<!-- Genre Field -->
<div class="form-group">
    {!! Form::label('genre', 'Genre:') !!}
    <p>{{ $user->genre }}</p>
</div>

<!-- Contact Field -->
<div class="form-group">
    {!! Form::label('contact', 'Contact:') !!}
    <p>{{ $user->contact }}</p>
</div>

<!-- Role Id Field -->
<div class="form-group">
    {!! Form::label('role_id', 'Role Id:') !!}
    <p>{{ $user->role_id }}</p>
</div>

