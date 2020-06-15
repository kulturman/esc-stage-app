@extends('layouts.app')
@section('title' , 'Modifier un Annee')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('annees.index') !!}">
            Liste des Annees
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Modifier un Annee</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Modifier un Annee</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::model($annee, ['id' => "edit-Annee-form", 'class' => 'main-form' , 'route' => ['annees.update', $annee->id], 'method' => 'patch']) !!}
                <div class="card-body row">
                    @include('annees.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('annees.store') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Annees
                    </a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection