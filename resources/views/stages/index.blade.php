@extends('layouts.app')

@if($role=='professeur')
@section('title' , 'Vos stagiaires')
@section('main-title' , 'Vos stagiaires')
@else
@section('title' , 'Liste des etudiants en stage')
@section('main-title' , 'Liste des etudiants en stage')
@endif

@section('title' , 'Liste des etudiants en stage')
@section('main-title' , 'Liste des etudiants en stage')
@section('breadcrumb')
<li class="breadcrumb-item main-form">
    <a>
        @if($role=='professeur')
        Vos stagiaires
        @else
        Liste des etudiants en stage
        @endif
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

@section('scripts')
@parent
<script>
    drawDataTableCallback = function () {
        $('#dataTableBuilder_wrapper .dt-buttons').append(`
            <button id="stat" class='dt-buttons btn btn-primary'
                data-url="{!! url('/stats/phase')  !!}"
                >
                Statistique par phase
            </button>
        `)
    }
    $(document).on('click', '#stat', function () {
        document.location = $(this).attr('data-url');
    })
</script>

@endsection
