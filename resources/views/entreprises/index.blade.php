@extends('layouts.app')
@section('title' , 'Liste des ' . 'Entreprises')
@section('main-title' , 'Liste des ' . 'Entreprises')
@section('breadcrumb')
    <li class="breadcrumb-item main-form">
        <a>
            Liste des Entreprises
        </a>
    </li>
@endsection

@section('content')
@include('flash::message')
<div class="card">
    <div class="card-body">
        @include('entreprises.table')
    </div>
</div>
@endsection

