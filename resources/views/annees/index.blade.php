@extends('layouts.app')
@section('title' , 'Liste des ' . 'Annees')
@section('main-title' , 'Liste des ' . 'Annees')
@section('breadcrumb')
    <li class="breadcrumb-item main-form">
        <a>
            Liste des Annees
        </a>
    </li>
@endsection

@section('content')
@include('flash::message')
<div class="card">
    <div class="card-body">
        @include('annees.table')
    </div>
</div>
@endsection

