<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{{ $preinscription->nom }}</p>
</div>

<!-- Contact Field -->
<div class="form-group">
    {!! Form::label('contact', 'Contact:') !!}
    <p>{{ $preinscription->contact }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $preinscription->email }}</p>
</div>

<!-- Module Id Field -->
<div class="form-group">
    {!! Form::label('module_id', 'Module Id:') !!}
    <p>{{ $preinscription->module_id }}</p>
</div>

