@extends('layouts.app')
@section('title' , 'Liste des ' . 'Preinscriptions')
@section('main-title' , 'Liste des ' . 'Preinscriptions')
@section('breadcrumb')
    <li class="breadcrumb-item main-form">
        <a>
            Liste des Preinscriptions
        </a>
    </li>
@endsection

@section('content')
@include('flash::message')
<div class="card">
    <div class="card-body">
        @include('preinscriptions.table')
    </div>
</div>
@endsection

@section('scripts')
    @parent
    <script>
        $(document).on('click', '.notify', function(e) {
            e.preventDefault();
            showLoader();
            $.post($(this).attr('href'))
                    .then(function(data) {
                        success("Relance envoyée avec succès");
                        closeLoader();
            })
        })
    </script>
@endsection('scripts')

