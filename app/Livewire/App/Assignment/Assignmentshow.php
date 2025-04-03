<?php

namespace App\Livewire\App\Assignment;

use App\Models\Employees;
use App\Models\Assignment;
use App\Models\Services;
use Livewire\Component;

class Assignmentshow extends Component
{

    public Services $service;
    public $employees = [];
    public $assigned = [];
    public $unassigned = [];
    public $priority;
    public function mount()
    {
        $this->refreshData();
    }
    public function refreshData()
    {

        $this->unassigned = Employees::select('id', 'name')
            ->whereDoesntHave('assignment', function ($query) {
                $query->where('services_id', $this->service->id);
            })->get();

        $this->assigned = Employees::select('id', 'name')
            ->whereHas('assignment', function ($query) {
                $query->where('services_id', $this->service->id);
            })->with('assignment', function ($q) {

                $q->select('id', 'employees_id')->where('services_id', $this->service->id)
                    ->where('tenants_id', auth()->user()->tenants_id);
            })->get();


        $this->priority = Assignment::where('services_id', $this->service->id)
            ->where('tenants_id', auth()->user()->tenants_id)
            ->where('priority',  true)->value('employees_id');
    }

    public function updatedPriority($employeeID)
    {

        Assignment::where('services_id', $this->service->id)
            ->where('tenants_id', auth()->user()->tenants_id)
            ->update(['priority' => false]);


        Assignment::where('services_id', $this->service->id)
            ->where('tenants_id', auth()->user()->tenants_id)
            ->where('employees_id', $employeeID)
            ->update(['priority' => true]);
    }
    public function assign($employeeID)
    {

        Assignment::create([
            'employees_id' => $employeeID,
            'services_id' => $this->service->id,
            'tenants_id' => auth()->user()->tenants_id,
        ]);

        $this->refreshData();
    }


    public function unassign($employeeID)
    {

        Assignment::where('employees_id', $employeeID)
            ->where('services_id', $this->service->id)
            ->where('tenants_id', auth()->user()->tenants_id)
            ->delete();

        $this->refreshData();
    }
    public function render()
    {
        return view('livewire.app.assignment.assignmentshow');
    }
}
