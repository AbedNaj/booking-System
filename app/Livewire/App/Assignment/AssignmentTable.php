<?php

namespace App\Livewire\App\Assignment;

use App\Models\Assignment;
use App\Models\Services;
use Aws\Api\Service;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AssignmentTable extends Component
{
    use WithPagination;
    public function render()
    {



        $services = Services::select('id', 'name')->withCount('assignment')->paginate(10);



        return view('livewire.app.assignment.assignment-table', ['datas' => $services]);
    }
}
