@extends('layouts.app')
@section('title' , 'Modifier un Prospect')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('prospects.index') !!}">
            Liste des Prospects
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Modifier un Prospect</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">Modifier un Prospect</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::model($prospect, ['id' => "edit-Prospect-form", 'class' => 'main-form' , 'route' => ['prospects.update', $prospect->id], 'method' => 'patch']) !!}
                <div class="card-body row">
                    @include('prospects.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('prospects.store') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des Prospects
                    </a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection