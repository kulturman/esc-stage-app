@extends('layouts.app')
@section('title' , 'Liste des ' . 'Filieres')
@section('main-title' , 'Liste des ' . 'Filieres')
@section('breadcrumb')
    <li class="breadcrumb-item main-form">
        <a>
            Liste des Filieres
        </a>
    </li>
@endsection

@section('content')
@include('flash::message')
<div class="card">
    <div class="card-body">
        @include('filieres.table')
    </div>
</div>
@endsection

