<?php

namespace App\DataTables;

use App\Models\Depot;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Util\StateUtil;

class RapportFinalDataTable extends DataTable {

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query) {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
                        ->addColumn('etudiant', function($row) {
                            ;
                            $student = $row->stage->etudiant;
                            //dd($student);
                            return $student->name . '(Mle: ' . $student->matricule . ')';
                        })
                        ->addColumn('date_depot', function($row) {
                            return $row->created_at->format('d/m/Y h:i');
                        })
                        ->addColumn('phase', function($row) {
                            return StateUtil::getLabel($row->stage->phase);
                        })
                        ->addColumn('action', 'rapports_finaux.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Depot $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Depot $model) {
        $query = $model->newQuery();
        $query
                ->where('final', true)
                ->where('validee', false)
                ->where('depot_etudiant', true);
        if (session('role') == 'professeur') {
            $query
                    ->select('depots.*')
                    ->join('stages', 'stages.id', 'depots.stage_id')
                    ->where('stages.prof_suivi_id', \Illuminate\Support\Facades\Auth::id());
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
                        ->addAction(['width' => '120px', 'printable' => false, 'title' => 'Actions',])
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
            'phase',
            'date_depot',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() {
        return 'depotsdatatable_' . time();
    }

}
