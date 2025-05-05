<?php

namespace App\Livewire\App\Employees;

use App\Models\Employee;
use App\Models\EmployeeType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmployeesShow extends Component
{
    use \Livewire\WithFileUploads;
    public $name, $email, $phone, $description, $employee_type_id,  $hire_date, $image, $status;

    public $editing = false;

    public $employeeTypes = [];
    public Employee $employee;

    public function mount()
    {
        $this->employee->load('EmployeeType');
        $this->employeeTypes = EmployeeType::select('id', 'name')->where('tenant_id', '=', Auth::user()->tenant_id)->get();
    }
    public function enableEdit()
    {
        $this->name = $this->employee->name;
        $this->email = $this->employee->email;
        $this->phone = $this->employee->phone;
        $this->description = $this->employee->description;
        $this->hire_date = $this->employee->hire_date;
        $this->employee_type_id = $this->employee->employee_type_id;
        $this->status = $this->employee->status;
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
            'image' => ['nullable', 'image', 'max:1024'],
        ]);
        if ($this->image) {
            $validated['image'] = $this->image
                ? $this->image->store(env('DO_DIRECTORY') . "/employee/{$validated['name']}", 'do')
                : null;
        } else {
            $validated['image'] = $this->employee->image;
        }
        $this->employee->update([
            'name' =>  $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'description' => $validated['description'],
            'employee_types_id' => $validated['employee_type_id'],
            'hire_date' => $validated['hire_date'],
            'status' => $validated['status'],
            'image' => $validated['image'],
            'tenant_id' => Auth::user()->tenant_id
        ]);
        $this->editing = false;

        session()->flash('success', __('employee-types.updateSuccess'));
    }
    public function render()
    {
        return view('livewire.app.employees.employees-show');
    }
}
