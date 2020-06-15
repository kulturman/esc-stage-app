@extends('layouts.app')
@section('title' , 'Créer un Filiere')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('filieres.index') !!}">
            Liste des Filieres
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Créer un Filiere</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Créer un Filiere</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form 
                method="POST"
                class = "main-form" role="form" action = "{!! route('filieres.store') !!}"
                id = "create-Filiere-form">
                {!! csrf_field() !!}
                <div class="card-body row">
                    @include('filieres.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('filieres.index') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Filieres
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection('content')
