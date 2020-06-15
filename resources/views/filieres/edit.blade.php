@extends('layouts.app')
@section('title' , 'Modifier un Filiere')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('filieres.index') !!}">
            Liste des Filieres
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Modifier un Filiere</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Modifier un Filiere</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::model($filiere, ['id' => "edit-Filiere-form", 'class' => 'main-form' , 'route' => ['filieres.update', $filiere->id], 'method' => 'patch']) !!}
                <div class="card-body row">
                    @include('filieres.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('filieres.store') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Filieres
                    </a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection