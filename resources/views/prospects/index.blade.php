@extends('layouts.app')
@section('title' , 'Liste des ' . 'Prospects')
@section('main-title' , 'Liste des ' . 'Prospects')
@section('breadcrumb')
    <li class="breadcrumb-item main-form">
        <a>
            Liste des Prospects
        </a>
    </li>
@endsection

@section('content')
@include('flash::message')
<div class="card">
    <div class="card-body">
        @include('prospects.table')
    </div>
</div>
@endsection

