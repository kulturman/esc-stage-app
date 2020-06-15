{!! Form::text('id', null, ['class' => 'form-control hidden-field']) !!}
<!-- Label Field -->
<div class="form-group col-sm-6">
    {!! Form::label('label', 'Label:') !!}
    {!! Form::text('label', null, ['class' => 'form-control']) !!}
    <strong class="error-label">
        @if($errors->has('label'))
            {!! $errors->first('label') !!}
        @endif
    </strong>
</div>
