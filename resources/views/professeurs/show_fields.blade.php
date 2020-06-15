<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $professeur->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $professeur->email }}</p>
</div>

<div class="form-group">
    {!! Form::label('genre', 'Genre:') !!}
    <p>{{ $professeur->genre }}</p>
</div>

<!-- Contact Field -->
<div class="form-group">
    {!! Form::label('contact', 'Contact:') !!}
    <p>{{ $professeur->contact }}</p>
</div>

