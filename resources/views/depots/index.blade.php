@extends('layouts.app')
@section('title' , 'Liste des dépôts de vos étudiants')
@section('main-title' , 'Liste des dépôts de vos étudiants')
@section('breadcrumb')
    <li class="breadcrumb-item main-form">
        <a>
            Liste des dépôts de vos étudiants
        </a>
    </li>
@endsection

@section('content')
@include('flash::message')
<div class="card">
    <div class="card-body">
        @include('depots.table')
    </div>
</div>
@endsection

@section('scripts')
    @parent
    <script>
        $(document).on('click', '.validate-btn', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            question('Voulez vous vraiement valider ce document?', function() {
                $.post(url)
                        .then(function(data) {
                            LaravelDataTables["dataTableBuilder"].draw();
                            success(data.message);
                })
            });
        })
    </script>
@endsection

