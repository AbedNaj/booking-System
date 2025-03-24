<?php

namespace App\Livewire\App\Common;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Table extends Component
{
    public Builder $query;
    public array $columns = [];
    public string $title = 'Table';
    public function render()
    {
        $rows = $this->query->get();

        return view('livewire.app.common.table', [
            'rows' => $rows,
            'columns' => $this->columns,
            'title' => $this->title,
        ]);
    }
}
