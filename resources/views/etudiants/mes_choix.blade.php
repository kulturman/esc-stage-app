@extends('layouts.app')
@section('title' , 'Mes choix d\'enseignants')
@section('main-title' , 'Mes choix d\'enseignants')
@section('breadcrumb')
<li class="breadcrumb-item main-form">
    <a>
        Mes choix d'enseignants
    </a>
</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Premier choix</th>
                <th>Deuxième choix</th>
                <th>Troisième choix</th>
            </tr>
        </thead>
        <tbody>
            @foreach($choix as $c)
                <td>{!! $c->choix1->name !!}</td>
                <td>{!! $c->choix2->name !!}</td>
                <td>{!! $c->choix3->name !!}</td>
            @endforeach()
        </tbody>
        <tfoot>
        <td colspan="3">
            <a href="{!! url('/choix/professeurs') !!}" class="btn btn-primary">Faire un autre choix</a>
        </td>
        </tfoot>
    </table>
</div>
</div>
@endsection

