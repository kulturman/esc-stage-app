<div class="container">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $myStudents }}</h3>
                    <p>Mes stagiaires</p>
                </div>
                <div class="icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <a href="{!! route('stages.index') !!}" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $depots }}</h3>
                    <p>Dépôts en attente de validation</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check"></i>
                </div>
                <a href="{!! route('depots.index') !!}" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $finalReportsProf }}</h3>

                    <p>Rapports en validation</p>
                </div>
                <div class="icon">
                    
                </div>
                <a href="{!! url('/rapports/validation') !!}" class="small-box-footer">
                    Plus d'infos <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>