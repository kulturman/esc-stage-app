@extends('layouts.app')
@section('title' , 'Modifier un Soutenance')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('soutenances.index') !!}">
            Liste des Soutenances
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Modifier un Soutenance</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Modifier un Soutenance</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::model($soutenance, ['id' => "edit-Soutenance-form", 'class' => 'main-form' , 'route' => ['soutenances.update', $soutenance->id], 'method' => 'patch']) !!}
                <div class="card-body row">
                    @include('soutenances.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('soutenances.store') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Soutenances
                    </a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection