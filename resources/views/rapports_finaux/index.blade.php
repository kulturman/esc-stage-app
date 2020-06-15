@extends('layouts.app')
@if(session('role') == 'professeur')
    @section('title' , 'Rapports de vos étudiants en attente de validation')
    @section('main-title' , 'Rapports de vos étudiants en attente de validation')
@else
    @section('title' , 'Rapports en attente de validation')
    @section('main-title' , 'Rapports en attente de validation')
@endif
@section('breadcrumb')
    <li class="breadcrumb-item main-form">
        <a>
            Rapports en attente de validation
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

