@extends('layouts.app')
@section('title' , 'Modifier un Professeur')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('professeurs.index') !!}">
            Liste des Professeurs
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Modifier un Professeur</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Modifier un Professeur</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::model($professeur, ['id' => "edit-Professeur-form", 'class' => 'main-form' , 'route' => ['professeurs.update', $professeur->id], 'method' => 'patch']) !!}
                <div class="card-body row">
                    @include('professeurs.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('professeurs.store') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Professeurs
                    </a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection