<?php

namespace App\DataTables;

use App\Models\Stage;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Util\StateUtil;

class StageDataTable extends DataTable {

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
                        ->addColumn('date_debut', function($row) {
                            return $row->date_debut->format('d/m/Y');
                        })
                        ->addColumn('phase', function($row) {
                            return StateUtil::getLabel($row->phase);
                        })
                        ->addColumn('etudiant', function($row) {
                            return $row->etudiant->name;
                        })
                        ->addColumn('filiere', function($row) {
                            return $row->filiere->nom_filiere;
                        })
                        ->addColumn('entreprise', function($row) {
                            return $row->entreprise ? $row->entreprise->nom : '';
                        })
                        ->addColumn('annee', function($row) {
                            $annee = $row->annee;
                            return $annee->debut . '/' . $annee->fin;
                        })
                        ->addColumn('action', 'stages.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Stage $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Stage $model) {
        $query = $model->newQuery();
        if(session('role') !== 'administrateur') {
            $query->where('prof_suivi_id', \Illuminate\Support\Facades\Auth::id());
        }
        return $query;
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
            'etudiant',
            'prof_suivi' => ['name' => 'prof_suivi', 'title' => 'Prof de suivi/DM'],
            'annee',
            'filiere',
            'phase',
            'entreprise',
            'maitre_de_stage',
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
