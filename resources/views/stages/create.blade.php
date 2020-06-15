@extends('layouts.app')
@section('title' , 'Créer un Stage')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('stages.index') !!}">
            Liste des Stages
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Créer un Stage pour</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">
                    Créer un Stage pour: {{ $student->name }}, matricule: {{ $student->matricule }}
                </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form 
                method="POST"
                class = "main-form" role="form" action = "{!! route('stages.store') !!}"
                id = "create-Stage-form">
                {!! csrf_field() !!}
                <div class="card-body row">
                    @include('stages.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('stages.index') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Stages
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection('content')
