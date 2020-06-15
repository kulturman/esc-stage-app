@extends('layouts.app')
@section('title' , 'Liste des professeurs disponlibles')
@section('main-title' , 'Liste des professeurs disponlibles')
@section('breadcrumb')
<li class="breadcrumb-item main-form">
    <a>
        Liste des professeurs disponlibles
    </a>
</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form id="filter-form">
            <div class="row">
                <div class="col-md-2">
                    <p>Domaine</p>
                </div>
                <div class="col-md-8">
                    <select class="form-control" id='select-module'>
                        @foreach($modules as $module)
                        <option
                            @if($filterModule == $module->id) selected @endif
                            value="{{ $module->id}}">
                            {{ $module->libelle }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div><br/>
    </form>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Professeur</th>
                <th>Modules enseignés</th>
            </tr>
        </thead>
        <tbody>
            @foreach($professeurs as $professeur)
            @if(count($professeur->studentsInStageNumber) < 3)
            <tr>
                <td>{{ $professeur->name }}</td>
                <?php
                $modules = $professeur->modules;
                $modulesString = '';
                if ($modules) {
                    for ($i = 0, $l = count($modules); $i < $l; $i++) {
                        $modulesString .= $modules[$i]->libelle;
                        if ($i !== $l - 1) {
                            $modulesString .= ', ';
                        }
                    }
                }
                ?> 
                <td>{{ $modulesString }}</td>
            </tr>
            @endif()
            @endforeach()
        </tbody>
        @if(session('role') == 'etudiant')
            <tfoot>
                <td colspan="3">
                    <a href="{!! url('/choix/professeurs') !!}" class="btn btn-primary">Faire votre choix</a>
                </td>
            </tfoot>
        @endif
    </table>
</div>
</div>
@endsection

@section('scripts')
@parent()
<script>
    var baseUrl = "{{ url('disponibles/professeurs') }}";
    $('#select-module').change(function (e) {
        window.location.href = baseUrl + '?module=' + e.target.value;
    })

    $('#choice-button').click(function (e) {
        $.post('')
                .done(function () {
                });
    })
</script>
@endsection()

