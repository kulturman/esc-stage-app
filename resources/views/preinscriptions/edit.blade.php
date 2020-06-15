@extends('layouts.app')
@section('title' , 'Modifier une Preinscription')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('preinscriptions.index') !!}">
            Liste des Preinscriptions
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Modifier une Preinscription</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Modifier une Preinscription</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::model($preinscription, ['id' => "edit-Preinscription-form", 'class' => 'main-form' , 'route' => ['preinscriptions.update', $preinscription->id], 'method' => 'patch']) !!}
                <div class="card-body row">
                    @include('preinscriptions.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('preinscriptions.store') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Preinscriptions
                    </a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection