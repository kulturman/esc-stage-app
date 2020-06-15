@extends('layouts.app')
@section('title' , 'Statistiques par phase de stage')
@section('main-title' , 'Statistiques par phase de stage')
@section('breadcrumb')
<li class="breadcrumb-item main-form">
    <a href="{!! route('stages.index') !!}">
        Etudiants en stage
    </a>
</li>
<li class="breadcrumb-item main-form">
    <a>
        Statistiques par phase de stage
    </a>
</li>
@endsection

@section('content')
@include('flash::message')
<div class="card">
    <div class="card-body">
        <?php

        use App\Util\StateUtil; ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th><?php echo StateUtil::getLabel(StateUtil::$INIT_PHASE) ?></th>
                    <th><?php echo StateUtil::getLabel(StateUtil::$FIRST_PART) ?></th>
                    <th><?php echo StateUtil::getLabel(StateUtil::$SECOND_PART) ?></th>
                    <th><?php echo StateUtil::getLabel(StateUtil::$THIRD_PART) ?></th>
                    <th><?php echo StateUtil::getLabel(StateUtil::$FINAL_EDITION_PART) ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $phases[StateUtil::$INIT_PHASE] ?></td>
                    <td><?php echo $phases[StateUtil::$FIRST_PART] ?></td>
                    <td><?php echo $phases[StateUtil::$SECOND_PART] ?></td>
                    <td><?php echo $phases[StateUtil::$THIRD_PART] ?></td>
                    <td><?php echo $phases[StateUtil::$FINAL_EDITION_PART] ?></td>
                </tr>
            </tbody>
        </table><br/>
        <a class="btn btn-primary" href="{!! route('stages.index') !!}">Retourner à la liste des étudiants en stage</a>

    </div>
</div>
@endsection
