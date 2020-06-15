@extends('layouts.app')
@section('title' , 'Modifier un User')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('users.index') !!}">
            Liste des utilisateurs
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Modifier un utilisateur</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Modifier un utilisateur</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::model($user, ['id' => "edit-User-form", 'class' => 'main-form' , 'route' => ['users.update', $user->id], 'method' => 'patch']) !!}
                <div class="card-body row">
                    @include('users.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('users.store') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Users
                    </a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection