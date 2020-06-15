@extends('layouts.app')
@section('title' , $label)

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route($bcRoute) !!}">
            {!! $bcLabel !!}
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>{!! $label !!}</a>
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header card-primary">
                <h3 class="card-title card-primary__title">{!! $label !!}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form 
                method="POST"
                class = "main-form" role="form" action = "{!! route('users.store') !!}"
                id = "create-User-form">
                {!! csrf_field() !!}
                <div class="card-body row">
                    @include('users.fields')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <a href = "{!! route($bcRoute) !!}"
                        type="submit" class="btn btn-primary">
                        Retourner à la liste
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection('content')
