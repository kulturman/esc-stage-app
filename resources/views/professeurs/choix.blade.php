@extends('layouts.app')
@section('title' , 'Choisir des professeurs de suivis')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{!! url('/disponibles/professeurs') !!}">
        Liste des Professeurs disponibles
    </a>
</li>
<li class="breadcrumb-item active">
    <a>Choisir des professeurs</a>
</li>
@endsection

@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card">
        <div class="card-header card-primary">
            <h3 class="card-title card-primary__title">Chosir des professeurs</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form 
            method="POST"
            class = "main-form" role="form" action = "{!! route('professeurs.choix') !!}"
            id = "choose-professeur-form">
            {!! csrf_field() !!}
            <div class="card-body row">
                @for($i = 1; $i<= 3; $i++)
                    <div class="form-group col-sm-6">
                        {!! Form::label('genre', 'Choix ' . $i . ': ') !!}
                        <select class="form-control" name="id_{!! 'choix_' . $i !!}">
                            <option value="">Faire un choix</option>
                            @foreach($professeurs as $professeur)
                                @if(count($professeur->studentsInStageNumber) < 3)

                                    <option value="{!!  $professeur->id !!}">
                                        {!!  $professeur->name !!}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        <strong class="error-label"></strong>
                    </div>
                @endfor
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Valider</button>
                <a href = "{!! url('/disponibles/professeurs') !!}"
                   type="submit" class="btn btn-primary">
                    Retourner à liste des professeurs disponibles
                </a>
            </div>
        </form>
    </div>
</div>
@endsection('content')
