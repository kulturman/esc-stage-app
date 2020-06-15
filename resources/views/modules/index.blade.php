@extends('layouts.app')
@section('title' , 'Liste des ' . 'domaines')
@section('main-title' , 'Liste des ' . 'domaines')
@section('breadcrumb')
    <li class="breadcrumb-item main-form">
        <a>
            Liste des domaines
        </a>
    </li>
@endsection

@section('content')
@include('flash::message')
<div class="card">
    <div class="card-body">
        @include('modules.table')
    </div>
</div>
@endsection

