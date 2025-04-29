<?php

namespace App\Livewire\App\Employees;

use App\Models\Employee;
use App\Models\EmployeeType;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EmployeesCreate extends Component
{
    public $employeeTypes = [];
    public $name, $email, $phone, $description, $employee_type_id, $hire_date, $status = 'active';


    public function mount()
    {

        $this->employeeTypes = EmployeeType::select('id', 'name')->where('tenant_id', '=', Auth::user()->tenant_id)->get();
    }

    public function EmployeeAdd()
    {
        $currentTenant = Auth::guard('web')->user()->tenant_id;
        $employeeRoleID = Role::select('id')->where('name', 'Employee')->value('id');
        $defaultPassword = Hash::make('12345678');



        $validated =  $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')
                ->where('role_id', $employeeRoleID)
                ->where('tenant_id', $currentTenant)],
            'phone' => ['nullable', 'string', 'max:20'],
            'description' => ['nullable', 'string', 'max:1000'],
            'employee_type_id' => ['required', 'exists:employee_types,id'],
            'hire_date' => ['required', 'date'],
            'status' => ['required',  'in:active,inactive'],
        ]);


        $user =    User::create([
            'email' => $validated['email'],
            'name' => $validated['name'],
            'role_id' => $employeeRoleID,
            'tenant_id' => $currentTenant,
            'password' => $defaultPassword,
            'email_verified_at' => now()
        ]);
        Employee::create([
            'name' =>  $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'description' => $validated['description'],
            'employee_type_id' => $validated['employee_type_id'],
            'hire_date' => $validated['hire_date'],
            'status' => $validated['status'],
            'tenant_id' => $currentTenant,
            'user_id' => $user->id
        ]);



        $this->dispatch('employeeAdd');

        $this->reset();
    }
    public function render()
    {
        return view('livewire.app.employees.employees-create');
    }
}
