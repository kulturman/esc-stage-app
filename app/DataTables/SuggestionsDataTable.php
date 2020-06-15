<?php
namespace App\DataTables;

use App\Models\Depot;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Facades\Auth;

class SuggestionsDataTable extends DataTable
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
                    ->addColumn('document', 'depots.suggestions_document_column')
                ->rawColumns(['document']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Depot $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Depot $model)
    {
        $query = $model->newQuery();
        $query
            ->select('depots.*')
            ->join('stages', 'stages.id', '=', 'depots.stage_id')
            ->where('amendee', false)
            ->where('validee', false)
            ->where('depot_etudiant', false)
            ->where('etudiant_id', Auth::id())
            ->orderBy('depots.created_at', 'DESC')->first();
        return $query;
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
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'buttons'   => [
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
            'commentaire',
            'document'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'depotsdatatable_' . time();
    }
}
