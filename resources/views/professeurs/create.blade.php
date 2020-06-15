@extends('layouts.app')
@section('title' , 'Créer un Professeur')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('professeurs.index') !!}">
            Liste des Professeurs
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Créer un Professeur</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Créer un Professeur</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form 
                method="POST"
                class = "main-form" role="form" action = "{!! route('professeurs.store') !!}"
                id = "create-Professeur-form">
                {!! csrf_field() !!}
                <div class="card-body row">
                    @include('professeurs.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('professeurs.index') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Professeurs
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection('content')
