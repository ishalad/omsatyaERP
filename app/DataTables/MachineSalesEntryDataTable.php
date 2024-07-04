<?php

namespace App\DataTables;

use App\Models\MachineSalesEntry;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MachineSalesEntryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (MachineSalesEntry $machineSalesEntry) {
                return  "<div class='btn-group'><a class='btn btn-sm btn-primary' href='" . route('MachineSales.edit', $machineSalesEntry) . "'><i class='fa fa-edit'></i></a> <a class='btn btn-sm btn-danger' href='javascript:void(0)' onclick='window.deleteParty(" . $machineSalesEntry->id . ")'><i class='fa fa-trash'></i></a></div>";
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(MachineSalesEntry $model): QueryBuilder
    {
        return $model->newQuery()->with('party', 'product', 'serviceType')->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('machinesalesentry-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('bill_no'),
            Column::make('date'),
            Column::make('order_no'),
            Column::make('mc_no'),
            Column::make('party.name'),
            Column::make('product.name'),
            Column::make('install_date'),
            Column::make('service_expiry_date'),
            Column::make('service_type.name'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'MachineSalesEntry_' . date('YmdHis');
    }
}
