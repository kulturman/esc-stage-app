@extends('layouts.app')
@section('title' , 'Déposer le rapport final')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('stages.my_stages') !!}">
            Vos stages
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Déposer le rapport finalt</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Déposer le rapport final</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form 
                enctype="multipart/form-data"
                method="POST"
                role="form" action = "{!! route('rapports.create') !!}"
                id = "create-Depot-form">
                {!! csrf_field() !!}
                <div class="card-body row">
                    @include('depots.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('stages.my_stages') !!}"
                        type="submit" class="btn btn-primary">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection('content')