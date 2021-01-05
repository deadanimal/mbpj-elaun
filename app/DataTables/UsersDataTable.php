<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function($row){
                            $btn = '<i data-toggle="modal" data-target="#modal-default" class="btn btn-primary btn-sm ni ni-align-center"></i>';
                            $btn = $btn.'<i data-toggle="modal" data-target="#modal-notification" class="btn btn-success btn-sm ni ni-check-bold"></i>';
                            $btn = $btn.'<i data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove"></i>';
                     return $btn;
                    })
            ->rawColumns(['action'])
            ->editColumn('created_at', function ($request) {
                return $request->created_at->locale('ms')->isoFormat('DD/MM/YYYY');
            });;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(0,'asc')
                    ->parameters([
                        'responsive' => true,
                        'autoWidth' => false
                      ])
                    
                    ;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                "name" => "id",
                "title" => "No",
                "data" => "id"
            ],
            'name',
            'email',
            'created_at',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
    
}
