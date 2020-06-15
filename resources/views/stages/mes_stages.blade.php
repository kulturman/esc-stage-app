@extends('layouts.app')
@section('title' , 'Mes stages / mémoire')
@section('main-title' , 'Mes stages / mémoire')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a>
            Mes stages-mémoire
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
        $(document).on('click', '.depot-btn', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $.get("{{ route('depots.can') }}")
                    .done(function(data) {
                   if(data.result) {
                       window.location = url;
                   }
                   else {
                       error('Vous avez déjà effectué un dépôt et votre professeur n\'a pas encore réagi');
                   }
            });
        })
    </script>
@endsection

