@extends('layouts.app')
@section('title' , 'Créer un Role')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('roles.index') !!}">
            Liste des Roles
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Créer un Role</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Créer un Role</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form 
                method="POST"
                class = "main-form" role="form" action = "{!! route('roles.store') !!}"
                id = "create-Role-form">
                {!! csrf_field() !!}
                <div class="card-body row">
                    @include('roles.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('roles.index') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Roles
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection('content')
