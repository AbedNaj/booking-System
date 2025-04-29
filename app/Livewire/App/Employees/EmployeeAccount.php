<?php

namespace App\Livewire\App\Employees;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EmployeeAccount extends Component
{
    public Employee $employee;

    public $email, $password;
    public function mount()
    {

        $this->email = $this->employee->email;
    }
    public function updateAccount()
    {
        $currentTenant = Auth::guard('web')->user()->tenant_id;

        $employeeRoleID = Role::select('id')->where('name', 'Employee')->value('id');
        $validated =  $this->validate([
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')
                    ->where('role_id', $employeeRoleID)
                    ->where('tenant_id',  $currentTenant)->ignore($this->employee->user->id),
            ],
            'password' => 'string'

        ]);
        $password = Hash::make($validated['password']);
        User::where('id', '=', $this->employee->user->id)->update([
            'email' => $validated['email'],
            'password' => $password

        ]);

        $this->employee->update(['email' => $validated['email']]);
        Session()->flash('success', __('employees.accountUpdateSuccess'));
        $this->reset('password');
    }
    public function render()
    {
        return view('livewire.app.employees.employee-account');
    }
}
