{!! Form::text('id', null, ['class' => 'form-control hidden-field']) !!}
<!-- Etudiant Id Field -->
<input type="text" value="{{ $student->id }}" name="etudiant_id" style="display: none"/>
<!-- Annee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('annee_id', 'Annee académique:') !!}
    <select class="form-control" id="annee_id" name="annee_id">
        <option value="">Sélectionner ...</option>
        @foreach($annees as $annee)
            <option
                @if(isset($stage) and $stage->annee_id == $annee->id))
                    selected
                @endif
                value="{{ $annee->id }}">
                {{ $annee->debut . '/' .$annee->fin }}
            </option>
        @endforeach
    </select>
    <strong class="error-label">
        @if($errors->has('annee_id'))
            {!! $errors->first('annee_id') !!}
        @endif
    </strong>
</div>

<!-- Filiere Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('filiere_id', 'Filiere:') !!}
    <select class="form-control" id="filiere_id" name="filiere_id">
        <option value="">Sélectionner ...</option>
        @foreach($filieres as $filiere)
            <option
                @if(isset($stage) and $stage->filiere_id == $filiere->id))
                    selected
                @endif
                value="{{ $filiere->id }}">
                {{ $filiere->nom_filiere }}
            </option>
        @endforeach
    </select>
    <strong class="error-label">
        @if($errors->has('filiere_id'))
            {!! $errors->first('filiere_id') !!}
        @endif
    </strong>
</div>
<!-- Niveau Field -->
<div class="form-group col-sm-6">
    {!! Form::label('niveau', 'Niveau:') !!}
    <select class="form-control" name="niveau" id="niveau">
        <option value="">Sélectionner ...</option>
        <option value="BTS"
               @if(isset($stage) and $stage->niveau == 'BTS') selected @endif 
                >BTS/DTS/DUT</option>
        <option value="Licence"
               @if(isset($stage) and $stage->niveau == 'Licence') selected @endif 
                >Licence</option>
        <option value="Master"
               @if(isset($stage) and $stage->niveau == 'Master') selected @endif 
                >Master</option>
    </select>
    <strong class="error-label">
        @if($errors->has('niveau'))
            {!! $errors->first('niveau') !!}
        @endif
    </strong>
</div>
<!-- Prof Suivi Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prof_suivi_id', 'Prof de suivi/Directeur de mémoire:') !!}
    <select class="form-control" id="prof_suivi_id" name="prof_suivi_id">
        <option value="">Sélectionner ...</option>
        @foreach($teachers as $teacher)
            <option
                @if(isset($stage) and $stage->prof_suivi_id == $teacher->id)
                    selected
                @endif
                value="{{ $teacher->id }}">
                {{ $teacher->name }}
            </option>
        @endforeach
    </select>
    <strong class="error-label">
        @if($errors->has('prof_suivi_id'))
            {!! $errors->first('prof_suivi_id') !!}
        @endif
    </strong>
</div>
<!-- Directeur Memoire Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entreprise_id', 'Entreprise:') !!}
    <select class="form-control" id="entreprise_id" name="entreprise_id">
        <option value="">Sélectionner ...</option>
        @foreach($enterprises as $enterprise)
            <option
                @if(isset($stage) and $stage->enterprise_id == $enterprise->id))
                    selected
                @endif
                value="{{ $enterprise->id }}">
                {{ $enterprise->nom }}
            </option>
        @endforeach
    </select>
    <strong class="error-label">
        @if($errors->has('entreprise_id'))
            {!! $errors->first('entreprise_id') !!}
        @endif
    </strong>
</div>
<!-- Maitre De Stage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('maitre_de_stage', 'Maitre De Stage:') !!}
    {!! Form::text('maitre_de_stage', null, ['class' => 'form-control']) !!}
    <strong class="error-label">
        @if($errors->has('maitre_de_stage'))
            {!! $errors->first('maitre_de_stage') !!}
        @endif
    </strong>
</div>

<!-- Date Debut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_debut', 'Date Debut:') !!}
    {!! Form::date('date_debut', null, ['class' => 'form-control','id'=>'date_debut']) !!}
    <strong class="error-label">
        @if($errors->has('date_debut'))
            {!! $errors->first('date_debut') !!}
        @endif
    </strong>
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_debut').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush
