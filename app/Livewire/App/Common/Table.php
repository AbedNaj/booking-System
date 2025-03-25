<?php

namespace App\Livewire\App\Common;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public string $model;
    public array $columns = [];
    public array $filters = [];
    public string $title = 'Table';
    public string $detailsRouteName;

    public string $listener;

    public function getListeners()
    {
        return [
            $this->listener => '$refresh',
        ];
    }
    public function getRowsProperty()
    {

        $query = ($this->model)::query();


        foreach ($this->filters as $filter) {
            $query->where($filter['field'], $filter['operator'], $filter['value']);
        }


        $query->orderByDesc('created_at');


        return $query->paginate(10);
    }

    public function render()
    {
        return view('livewire.app.common.table', [
            'rows' => $this->rows,
            'columns' => $this->columns,
            'title' => $this->title,
        ]);
    }
}
