@extends('layouts.app')
@section('title' , 'Changement de mot de passe')

@section('breadcrumb')
<li class="breadcrumb-item active">
    <a>Changez votre mot de passe</a>
</li>
@endsection

@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card">
        <div class="card-header card-primary">
            <h3 class="card-title card-primary__title">Changez votre mot de passe</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form 
            method="POST"
            class = "main-form" role="form" action = "{!! route('users.change_password') !!}"
            id = "create-User-form">
            {!! csrf_field() !!}
            <div class="card-body row">
                <div class="form-group col-sm-6">
                    {!! Form::label('name', 'Nouveau mot de passe') !!}
                    <input class="form-control"  type="password" name="password" />
                    <strong class="error-label">
                    </strong>
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('name', 'Confirmation') !!}
                    <input class="form-control"  type="password" name="password_confirmation" />
                    <strong class="error-label">
                    </strong>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Valider</button>
            </div>
        </form>
    </div>
</div>
@endsection('content')
