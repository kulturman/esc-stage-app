@extends('layouts.app')
@section('title' , 'Créer un Module')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('modules.index') !!}">
            Liste des domaines
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Créer un domaine</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Créer un domaine</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form 
                method="POST"
                class = "main-form" role="form" action = "{!! route('modules.store') !!}"
                id = "create-Module-form">
                {!! csrf_field() !!}
                <div class="card-body row">
                    @include('modules.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('modules.index') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des domaines
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection('content')
