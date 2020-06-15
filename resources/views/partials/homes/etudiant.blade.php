<div class="container">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                @if($stage != null)
                    <div class="inner">
                        <h3>1</h3>
                        <p>Mes corrections</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                <a href="{!! route('depots.view_suggesions', [$stage->id]) !!}" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
                @else
                <div class="inner">
                        <h3>0</h3>
                        <p>Mes corrections</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                <a href="#" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
                @endif
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>3</h3>
                    <p>Faire un choix</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <a href="{!! url('/mes/choix') !!}" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
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
    </div>
</div>