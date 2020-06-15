@extends('layouts.app')
@section('title' , 'Liste des ' . 'Soutenances')
@section('main-title' , 'Liste des ' . 'Soutenances')
@section('breadcrumb')
    <li class="breadcrumb-item main-form">
        <a>
            Liste des Soutenances
        </a>
    </li>
@endsection

@section('content')
@include('flash::message')
<div class="card">
    <div class="card-body">
        @include('soutenances.table')
    </div>
</div>
@endsection

