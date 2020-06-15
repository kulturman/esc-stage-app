<?php

namespace App\DataTables;

use App\Models\Professeur;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Util\Util;

class ProfesseurDataTable extends DataTable {

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query) {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
                        ->addColumn('modules', function($row) {
                            $modules = $row->modules;
                            $modulesString = '';
                            if ($modules) {
                                for ($i = 0, $l = count($modules); $i < $l; $i++) {
                                    $modulesString .= $modules[$i]->libelle;
                                    if($i !== $l - 1) {
                                        $modulesString .= ', ';
                                    }
                                }
                            }
                            return $modulesString;
                        })
                        ->addColumn('etudiants', function($row) {
                            return count($row->studentsInStageNumber);
                        })
                        ->addColumn('action', 'professeurs.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Professeur $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Professeur $model) {
        return $model->newQuery()->where('role_id', Util::$PROFESSOR_ID);
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
                        ->addAction(['width' => '120px', 'printable' => false, 'title' => 'Actions',])
                        ->parameters([
                            'dom' => 'Bfrtip',
                            'stateSave' => true,
                            'order' => [[0, 'desc']],
                            'buttons' => [
                                    ['extend' => 'create', 'className' => 'btn btn-primary',],
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
            'name',
            'modules' => ['name' => 'modules', 'title' => 'Modules enseignés'],
            'email',
            'etudiants' => ['name' => 'etudiants', 'title' => "Nombre d'étudiants en stage" ],
            'genre',
            'contact'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() {
        return 'professeursdatatable_' . time();
    }

}
