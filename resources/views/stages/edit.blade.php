@extends('layouts.app')
@section('title' , 'Modifier un Stage')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('stages.index') !!}">
            Liste des Stages
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Modifier un Stage</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Modifier un Stage</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::model($stage, ['id' => "edit-Stage-form", 'class' => 'main-form' , 'route' => ['stages.update', $stage->id], 'method' => 'patch']) !!}
                <div class="card-body row">
                    @include('stages.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('stages.store') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Stages
                    </a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection