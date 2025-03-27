<?php

namespace App\Livewire\App\Employees;

use App\Models\Employees;
use App\Models\EmployeeTypes;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmployeesCreate extends Component
{
    public $employeeTypes = [];
    public $name, $email, $phone, $description, $employee_type_id, $hire_date, $status = 'active';


    public function mount()
    {

        $this->employeeTypes = EmployeeTypes::select('id', 'name')->where('tenants_id', '=', Auth::user()->tenants_id)->get();
    }

    public function EmployeeAdd()
    {
        $validated =  $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'description' => ['nullable', 'string', 'max:1000'],
            'employee_type_id' => ['required', 'exists:employee_types,id'],
            'hire_date' => ['required', 'date'],
            'status' => ['required',  'in:active,inactive'],
        ]);

        Employees::create([
            'name' =>  $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'description' => $validated['description'],
            'employee_types_id' => $validated['employee_type_id'],
            'hire_date' => $validated['hire_date'],
            'status' => $validated['status'],
            'tenants_id' => Auth::user()->tenants_id
        ]);

        $this->dispatch('employeeAdd');

        $this->reset();
    }
    public function render()
    {
        return view('livewire.app.employees.employees-create');
    }
}
