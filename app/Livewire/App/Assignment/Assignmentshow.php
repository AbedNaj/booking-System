<?php

namespace App\Livewire\App\Assignment;

use App\Models\Employee;
use App\Models\Assignment;
use App\Models\Service;
use Livewire\Component;

class Assignmentshow extends Component
{

    public Service $service;
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

        $this->unassigned = Employee::select('id', 'name')
            ->whereDoesntHave('assignment', function ($query) {
                $query->where('service_id', $this->service->id);
            })->get();

        $this->assigned = Employee::select('id', 'name')
            ->whereHas('assignment', function ($query) {
                $query->where('service_id', $this->service->id);
            })->with('assignment', function ($q) {

                $q->select('id', 'employee_id')->where('service_id', $this->service->id)
                    ->where('tenant_id', auth()->user()->tenant_id);
            })->get();


        $this->priority = Assignment::where('service_id', $this->service->id)
            ->where('tenant_id', auth()->user()->tenant_id)
            ->where('priority',  true)->value('employee_id');
    }

    public function updatedPriority($employeeID)
    {

        Assignment::where('service_id', $this->service->id)
            ->where('tenant_id', auth()->user()->tenant_id)
            ->update(['priority' => false]);


        Assignment::where('service_id', $this->service->id)
            ->where('tenant_id', auth()->user()->tenant_id)
            ->where('employee_id', $employeeID)
            ->update(['priority' => true]);
    }
    public function assign($employeeID)
    {

        Assignment::create([
            'employee_id' => $employeeID,
            'service_id' => $this->service->id,
            'tenant_id' => auth()->user()->tenant_id,
        ]);

        $this->refreshData();
    }


    public function unassign($employeeID)
    {

        Assignment::where('employee_id', $employeeID)
            ->where('service_id', $this->service->id)
            ->where('tenant_id', auth()->user()->tenant_id)
            ->delete();

        $this->refreshData();
    }
    public function render()
    {
        return view('livewire.app.assignment.assignmentshow');
    }
}
