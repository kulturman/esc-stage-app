{!! Form::text('id', null, ['class' => 'form-control hidden-field']) !!}
<!-- Stage Id Field -->
<input type="text" value="{{ $stage->id }}" name="stage_id" class="hidden-field"/>

<!-- Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('path', 'Document à déposer:') !!}
    <input type="file" class="form-control" name="path"/>
    <strong class="error-label">
        @if($errors->has('path'))
            {!! $errors->first('path') !!}
        @endif
    </strong>
</div>
