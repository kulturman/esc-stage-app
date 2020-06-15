@extends('layouts.app')
@section('title' , 'Créer un Entreprise')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('entreprises.index') !!}">
            Liste des Entreprises
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Créer un Entreprise</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Créer un Entreprise</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form 
                method="POST"
                class = "main-form" role="form" action = "{!! route('entreprises.store') !!}"
                id = "create-Entreprise-form">
                {!! csrf_field() !!}
                <div class="card-body row">
                    @include('entreprises.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('entreprises.index') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Entreprises
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection('content')
