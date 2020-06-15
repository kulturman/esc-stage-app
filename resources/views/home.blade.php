@extends('layouts.app')

@section('title' , 'Accueil')

@if(!Auth::user())
@section('main-title' , 'Liste des procédures administratives')
@endif

@section('content')
    @include('partials.homes.'.session('role'))
@endsection