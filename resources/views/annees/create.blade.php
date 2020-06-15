@extends('layouts.app')
@section('title' , 'Créer un Annee')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('annees.index') !!}">
            Liste des Annees
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Créer un Annee</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Créer un Annee</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form 
                method="POST"
                class = "main-form" role="form" action = "{!! route('annees.store') !!}"
                id = "create-Annee-form">
                {!! csrf_field() !!}
                <div class="card-body row">
                    @include('annees.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('annees.index') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Annees
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection('content')
