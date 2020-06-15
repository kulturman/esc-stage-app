@extends('layouts.app')
@section('title' , $title )
@section('main-title' , $title)
@section('breadcrumb')
    <li class="breadcrumb-item main-form">
        <a>
            {{ $title }}
        </a>
    </li>
@endsection

@section('content')
@include('flash::message')
<div class="card">
    <div class="card-body">
        @include('users.table')
    </div>
</div>
@endsection

