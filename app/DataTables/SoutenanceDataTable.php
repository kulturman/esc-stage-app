<?php

namespace App\DataTables;

use App\Models\Soutenance;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class SoutenanceDataTable extends DataTable {

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query) {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
                        ->addColumn('user_id', function($row) {
                            $user = $row->user;
                            return $user->name . " (matricule: $user->matricule)";
                        })
                        ->addColumn('module_id', function($row) {
                            return $row->module->libelle;
                        })
                        ->addColumn('users', function($row) {
                            $users = $row->users;
                            $string = '';
                            if ($users) {
                                for ($i = 0, $l = count($users); $i < $l; $i++) {
                                    $string .= $users[$i]->name;
                                    if($i !== $l - 1) {
                                        $string .= ', ';
                                    }
                                }
                            }
                            return $string;
                            return $row->module->libelle;
                        })
                        ->addColumn('annee_id', function($row) {
                            $annee = $row->annee;
                            return $annee->debut . '/' . $annee->fin;
                        })
                        ->addColumn('action', 'soutenances.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Soutenance $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Soutenance $model) {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html() {
        $buttons = [['extend' => 'export', 'className' => 'btn btn-default',],
                ['extend' => 'print', 'className' => 'btn btn-success',],
                ['extend' => 'reset', 'className' => 'btn btn-danger',]];
        $user = auth()->user();
        if ($user->role_id == 11) {
            $buttons = array_merge([['extend' => 'create', 'className' => 'btn btn-primary',]], $buttons);
        }

        return $this->builder()
                        ->columns($this->getColumns())
                        ->minifiedAjax()
                        ->addAction(['width' => '120px', 'printable' => false, 'title' => 'Actions',])
                        ->parameters([
                            'dom' => 'Bfrtip',
                            'stateSave' => true,
                            'order' => [[0, 'desc']],
                            'buttons' => $buttons,
        ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns() {
        return [
            'theme',
            'user_id' => ['name' => 'user_id', 'title' => 'Etudiant'],
            'module_id' => ['name' => 'module_id', 'title' => 'Domaine'],
            'annee_id' => ['name' => 'annee_id', 'title' => 'Année académique'],
            'users' => ['name' => 'users', 'title' => 'Membres du jury']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() {
        return 'soutenancesdatatable_' . time();
    }

}
