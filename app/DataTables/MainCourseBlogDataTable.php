<?php

namespace App\DataTables;

use App\Models\MainCourseBlog;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MainCourseBlogDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'maincourseblog.action')
            ->addIndexColumn()
            ->editColumn('created_at', function ($data) {
                return $data->created_at->diffForHumans(); // human readable format
            })

            ->editColumn('title', function ($data) {
                return '<a target="_blank" href="' . route('main.course.single.blog', [$data->course->slug, $data->slug]) . '"> ' . $data->title . '</a>';
            })

            ->editColumn('updated_at', function ($data) {
                return $data->updated_at->diffForHumans(); // human readable format
            })

            ->editColumn('image', function ($data) {
                return '<img src="' . asset($data->image) . '" width="100" />';
            })

            ->editColumn('category', function ($data) {
                return $data->category->title;
            })

            ->editColumn('course', function ($data) {
                return $data->course->title;
            })

            

            ->editColumn('status', function ($data) {
                if ($data->status == STATUS_ACTIVE) {
                    return '<span class="text-primary p-1">Public</span>';
                } else {
                    return '<span class="text-warning p-1">Draft</span>';
                }
            })

            ->editColumn('action', function ($data) {
                return
                    '<div class="d-flex action-btn">
                        <a class="btn btn-icon btn-success" style="margin-right: 5px;" href="' . route('main.course.blog.edit', $data->id) . '"><i class="ft-edit"></i></a>
                        <a data-id="' . $data->id . '" class="btn btn-icon btn-danger delete-data" style="margin-right: 5px;" href="#"><i class="ft-trash-2"></i></a> 
                    </div>';
            })
            ->rawColumns(['action', 'status', 'image', 'title']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\MainCourseBlog $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MainCourseBlog $model): QueryBuilder
    {
        return $model->with('category', 'course')->orderBy('created_at', 'DESC')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
        ->addIndex()
        ->setTableId('data-table')->addTableClass('table table-striped table-bordered zero-configuration dataTable')->autoWidth()
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->serverSide(true)
        ->dom('lBfrtip')
        ->orderBy(0)
        ->buttons(
            Button::make('copy')->addClass('btn-secondary'),
            Button::make('print')->addClass('btn-secondary'),
            Button::make('pdf')->addClass('btn-secondary'),
            Button::make('excel')->addClass('btn-secondary'),
            Button::make('colvis')->text('Show')->addClass('btn-secondary'),
        );
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('SL')->orderable(false)->searchable(false),
            Column::make('image'),
            Column::make('title'),
            Column::make('category')->orderable(false)->searchable(false),
            Column::make('course')->orderable(false)->searchable(false),
            Column::make('status'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('table-actions'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'MainCourseBlog_' . date('YmdHis');
    }
}
