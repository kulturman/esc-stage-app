<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Models\ChoixEtudiant;

class ChoixEtudiantsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
                    ->addColumn('etudiant', function($row) {
                        $etudiant = $row->etudiant;
                        return $etudiant->name . " (matricule : $etudiant->matricule)";
                    })
                    ->addColumn('choix1', function($row) {
                        return $row->choix1->name;
                    })
                    ->addColumn('choix2', function($row) {
                        return $row->choix2->name;
                    })
                    ->addColumn('choix3', function($row) {
                        return $row->choix3->name;
                    })
                    ->addColumn('action', 'etudiants.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Annee $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ChoixEtudiant $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => 'Actions',])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'export', 'className' => 'btn btn-default',]
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'etudiant',
            'choix1' => ['name' => 'choix1', 'title' => 'Premier choix'],
            'choix2' => ['name' => 'choix2', 'title' => 'Deuxième choix'],
            'choix3' => ['name' => 'choix3', 'title' => 'Troisième choix'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'anneesdatatable_' . time();
    }
}
