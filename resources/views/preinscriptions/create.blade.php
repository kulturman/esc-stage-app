@extends('layouts.app')
@section('title' , 'Créer une Preinscription')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('preinscriptions.index') !!}">
            Liste des Preinscriptions
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Créer une Preinscription</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Créer une Preinscription</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form 
                method="POST"
                class = "main-form" role="form" action = "{!! route('preinscriptions.store') !!}"
                id = "create-Preinscription-form">
                {!! csrf_field() !!}
                <div class="card-body row">
                    @include('preinscriptions.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('preinscriptions.index') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Preinscriptions
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection('content')
