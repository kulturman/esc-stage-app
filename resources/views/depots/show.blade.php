@extends('layouts.app')
@section('title' , 'Détails Depot')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! route('depots.index') !!}">
            Liste des Depots
        </a>
    </li>
    <li class="breadcrumb-item active">
        <a>Détails</a>
    </li>
@endsection



@section('content')
    <div class="card">
        <div class="card-header card-primary">
            <h3 class="card-primary__title">Détails de Depot : </h3> 
        </div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                        @include('depots.show_fields')
                    </tbody>
                </table>
                <a class="btn btn-primary" href="{!! route('depots.index') !!}">
                    Retour à la liste
                </a>
            </div>
        </div>
    </div>
@endsection

