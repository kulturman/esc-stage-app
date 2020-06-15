<?php

namespace App\DataTables;

use App\Models\Professeur;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Util\Util;

class ChoixProfesseurDataTable extends DataTable {

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
                        ->addColumn('#', 'partials.tableItemSelect')
                        ->rawColumns(['#']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Professeur $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Professeur $model) {
        $query = $model->newQuery();
        $query
            ->where('role_id', Util::$PROFESSOR_ID);
            //->where('');
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
                        ->parameters([
                            'dom' => 'Bfrtip',
                            'stateSave' => true,
                            'order' => [[0, 'desc']],
                            'buttons' => [

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
            '#',
            'name',
            'modules' => ['name' => 'modules', 'title' => 'Modules enseignés'],
            'email',
            'etudiants' => ['name' => 'etudiants', 'title' => "Nombre d'étudiants en stage" ],
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
