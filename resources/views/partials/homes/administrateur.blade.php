<div class="container">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{!! $stagesNumber !!}</h3>
                    <p>Etudiants en stage</p>
                </div>
                <div class="icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <a href="{!! route('stages.index') !!}" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $studentsChoices }}</h3>
                    <p>Choix des étudiants</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <a href="{!! url('/choix/etudiants') !!}" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $freeProfesseurs }}</h3>

                    <p>Professeurs libres</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{!! url('/disponibles/professeurs') !!}" class="small-box-footer">
                    Plus d'infos <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $finalReportsAdmin }}</h3>

                    <p>Rapports en validation</p>
                </div>
                <a href="{!! url('/rapports/validation') !!}" class="small-box-footer">
                    Plus d'infos <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>