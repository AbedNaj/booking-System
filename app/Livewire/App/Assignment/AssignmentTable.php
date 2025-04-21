<?php

namespace App\Livewire\App\Assignment;

use App\Models\Assignment;
use App\Models\Service;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AssignmentTable extends Component
{
    use WithPagination;
    public function render()
    {



        $services = Service::select('id', 'name')->withCount('assignment')
            ->where('tenant_id', auth()->user()->tenant_id)

            ->paginate(10);



        return view('livewire.app.assignment.assignment-table', ['datas' => $services]);
    }
}
