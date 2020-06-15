{!! Form::text('id', null, ['class' => 'form-control hidden-field']) !!}
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    <strong class="error-label">
        @if($errors->has('name'))
            {!! $errors->first('name') !!}
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

<!-- Genre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('genre', 'Genre:') !!}
    <select class="form-control" name="genre">
        <option
            value="masculin"
            @if (isset($professeur) and $professeur->genre=='masculin')
            selected @endif()>Masculin</option>
        <option value="feminin"
                @if(isset($professeur) and $professeur->genre=='feminin')
            selected @endif()>
            Féminin</option>
    </select>
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

<div class="form-group col-sm-6">
    {!! Form::label('modules', 'Modules enseignés') !!}
    <select name="modules[]" class="form-control" id="modules" multiple required="required">
        @foreach($modules as $module)
            <option value="{{ $module->id }}"
                @if(isset ($profModules) and in_array($module->id, $profModules)) selected @endif>
                {{ $module->libelle }}
            </option>
        @endforeach
    </select>
</div>
