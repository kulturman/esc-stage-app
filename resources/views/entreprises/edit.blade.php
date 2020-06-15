@extends('layouts.app')
@section('title' , 'Modifier un Entreprise')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('entreprises.index') !!}">
            Liste des Entreprises
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Modifier un Entreprise</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Modifier un Entreprise</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::model($entreprise, ['id' => "edit-Entreprise-form", 'class' => 'main-form' , 'route' => ['entreprises.update', $entreprise->id], 'method' => 'patch']) !!}
                <div class="card-body row">
                    @include('entreprises.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('entreprises.store') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Entreprises
                    </a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection