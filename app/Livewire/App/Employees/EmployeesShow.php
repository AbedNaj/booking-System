<?php

namespace App\Livewire\App\Employees;

use App\Models\Employees;
use App\Models\EmployeeTypes;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmployeesShow extends Component
{
    public $name, $email, $phone, $description, $employee_type_id,  $hire_date, $status;

    public $editing = false;
    public $employeeTypes = [];
    public Employees $employees;

    public function mount()
    {
        $this->employees->load('EmployeeTypes');
        $this->employeeTypes = EmployeeTypes::select('id', 'name')->where('tenants_id', '=', Auth::user()->tenants_id)->get();
    }
    public function enableEdit()
    {
        $this->name = $this->employees->name;
        $this->email = $this->employees->email;
        $this->phone = $this->employees->phone;
        $this->description = $this->employees->description;
        $this->hire_date = $this->employees->hire_date;
        $this->employee_type_id = $this->employees->employee_types_id;
        $this->status = $this->employees->status;
        $this->editing = true;
    }

    public function save()
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

        $this->employees->update([
            'name' =>  $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'description' => $validated['description'],
            'employee_types_id' => $validated['employee_type_id'],
            'hire_date' => $validated['hire_date'],
            'status' => $validated['status'],
            'tenants_id' => Auth::user()->tenants_id
        ]);
        $this->editing = false;

        session()->flash('success', __('employee-types.updateSuccess'));
    }
    public function render()
    {
        return view('livewire.app.employees.employees-show');
    }
}
