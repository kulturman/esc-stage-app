@extends('layouts.app')
@section('title' , 'Liste des ' . 'Professeurs')
@section('main-title' , 'Liste des ' . 'Professeurs')
@section('breadcrumb')
    <li class="breadcrumb-item main-form">
        <a>
            Liste des Professeurs
        </a>
    </li>
@endsection

@section('content')
@include('flash::message')
<div class="card">
    <div class="card-body">
        @include('professeurs.table')
    </div>
</div>
@endsection

