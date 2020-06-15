@extends('layouts.app')
@section('title' , 'Créer un Prospect')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('prospects.index') !!}">
            Liste des Prospects
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Créer un Prospect</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Créer un Prospect</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form 
                method="POST"
                class = "main-form" role="form" action = "{!! route('prospects.store') !!}"
                id = "create-Prospect-form">
                {!! csrf_field() !!}
                <div class="card-body row">
                    @include('prospects.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('prospects.index') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Prospects
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection('content')
