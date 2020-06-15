@extends('layouts.app')
@section('title' , 'Liste des ' . 'Roles')
@section('main-title' , 'Liste des ' . 'Roles')
@section('breadcrumb')
    <li class="breadcrumb-item main-form">
        <a>
            Liste des Roles
        </a>
    </li>
@endsection

@section('content')
@include('flash::message')
<div class="card">
    <div class="card-body">
        @include('roles.table')
    </div>
</div>
@endsection

