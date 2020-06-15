@extends('layouts.app')
@section('title' , 'Modifier un Module')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('modules.index') !!}">
            Liste des Modules
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Modifier un Module</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Modifier un Module</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::model($module, ['id' => "edit-Module-form", 'class' => 'main-form' , 'route' => ['modules.update', $module->id], 'method' => 'patch']) !!}
                <div class="card-body row">
                    @include('modules.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('modules.store') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Modules
                    </a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection