@extends('layouts.app')
@section('title' , 'Modifier un Depot')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('depots.index') !!}">
            Liste des Depots
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Modifier un Depot</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Modifier un Depot</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::model($depot, ['id' => "edit-Depot-form", 'class' => 'main-form' , 'route' => ['depots.update', $depot->id], 'method' => 'patch']) !!}
                <div class="card-body row">
                    @include('depots.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('depots.store') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Depots
                    </a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection