@extends('layouts.app')
@section('title' , 'Amender un document')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('depots.index') !!}">
            Dépots de vos étudiants
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Amender un document</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">
                    Amender un document
                </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form 
                enctype="multipart/form-data"
                method="POST"
                role="form" action = "{!! route('depots.amend', [$depot->id]) !!}"
                id = "create-Depot-form">
                {!! csrf_field() !!}
                <div class="card-body row">
                    {!! Form::label('path', 'Document à déposer:') !!}
                    <input type="file" class="form-control" name="path" required=""/>
                    {!! Form::label('path', 'Commentaire:') !!}<br/>
                    <textarea class="form-control" name="commentaire"></textarea>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route('depots.index') !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à liste des dépôts de vos étudiants
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection('content')
