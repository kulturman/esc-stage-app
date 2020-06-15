@extends('layouts.app')
@section('title' , 'Créer une soutenance')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{!! route('soutenances.index') !!}">
        Liste des soutenances
    </a>
</li>
<li class="breadcrumb-item active">
    <a>Enregistrer une soutenance</a>
</li>
@endsection

@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card">
        <div class="card-header card-primary">
            <h3 class="card-title card-primary__title">Enregistrer une soutenance</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form 
            method="POST"
            enctype="multipart/form-data"
            role="form" action = "{!! route('soutenances.store') !!}"
            id = "create-Soutenance-form">
            {!! csrf_field() !!}
            <div class="card-body row">
                @include('soutenances.fields')
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Valider</button>
                <a href = "{!! route('soutenances.index') !!}"
                   type="submit" class="btn btn-primary">
                    Retourner à liste des Soutenances
                </a>
            </div>
        </form>
    </div>
</div>
@endsection('content')

@section('scripts')
@parent
<script>
    $(function () {
        $("#user_id").select2({
            ajax: {
                url: "{!! route('etudiants.get-by-name') !!}",
                dataType: 'json',
                data: function (params) {
                    return {
                        q: params.term, // search term
                    };
                },
                processResults: function (data, params) {
                    console.log(data);
                    return {
                        results: data,
                    };
                },
                cache: true
            },
            placeholder: 'Rechercher un étudiant',
            minimumInputLength: 5,
        });
    })
</script>
@endsection('scripts')
