<?php

namespace App\DataTables;

use App\Models\Stage;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Util\StateUtil;

class MesStagesDataTable extends DataTable {

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query) {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
                        ->addColumn('prof_suivi', function($row) {
                            return $row->profDeSuivi->name;
                        })
                        ->addColumn('phase', function($row) {
                            return StateUtil::getLabel($row->phase);
                        })
                        ->addColumn('filiere', function($row) {
                            return $row->filiere->nom_filiere;
                        })
                        ->addColumn('annee', function($row) {
                            $annee = $row->annee;
                            return $annee->debut . '/' . $annee->fin;
                        })
                        ->addColumn('action', 'stages.mes_stages_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Stage $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Stage $model) {
        return $model
                ->newQuery()
                ->where('etudiant_id', \Illuminate\Support\Facades\Auth::id());
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html() {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '120px', 'printable' => false, 'title' => 'Actions'])
                    ->parameters([
                        'dom' => 'Bfrtip',
                        'stateSave' => true,
                        'order' => [[0, 'desc']],
                        'buttons' => [
                            ['extend' => 'export', 'className' => 'btn btn-default',],
                            ['extend' => 'print', 'className' => 'btn btn-success',],
                            ['extend' => 'reset', 'className' => 'btn btn-danger',]
                        ],
        ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns() {
        return [
            'prof_suivi' => ['name' => 'prof_suivi', 'title' => 'Directeur de mémoire / Prof de suivi'],
            'maitre_de_stage',
            'annee',
            'phase',
            'niveau',
            'date_debut',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() {
        return 'stagesdatatable_' . time();
    }

}
