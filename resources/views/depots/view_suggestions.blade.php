@extends('layouts.app')
@section('title' , 'Corrections enseignants')
@section('main-title' , 'Corrections enseignants')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{!! url('/mes/stages') !!}">
            Mes stages
        </a>
    </li>
    <li class="breadcrumb-item">
        <a>
            Corrections
        </a>
    </li>
@endsection

@section('content')
@include('flash::message')
<div class="card">
    <div class="card-body">
        @include('stages.table')
    </div>
</div>
@endsection
