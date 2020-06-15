@extends('layouts.app')
@section('title' , 'Modifier un Role')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('roles.index') !!}">
            Liste des Roles
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Modifier un Role</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Modifier un Role</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::model($role, ['id' => "edit-Role-form", 'class' => 'main-form' , 'route' => ['roles.update', $role->id], 'method' => 'patch']) !!}
                <div class="card-body row">
                    @include('roles.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('roles.store') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Roles
                    </a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection