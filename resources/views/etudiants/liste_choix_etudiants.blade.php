@extends('layouts.app')
@section('title' , 'Choix des étudiants')
@section('main-title' , 'Choix des étudiants')
@section('breadcrumb')
<li class="breadcrumb-item main-form">
    <a>
        Choix des étudiants
    </a>
</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @include('etudiants.table')
    </div>
</div>
@endsection

