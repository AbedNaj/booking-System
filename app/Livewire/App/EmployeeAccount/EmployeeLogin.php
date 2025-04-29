<?php

namespace App\Livewire\App\EmployeeAccount;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.employee-login')]
class EmployeeLogin extends Component
{
    public $email, $password;

    public function mount() {}
    public function login()
    {
        $validated = $this->validate(
            [
                'email' => 'required|string|email',
                'password' => 'required|string'
            ]
        );

        $EmployeeRole = Role::select(['id'])->where('name', '=', 'Employee')->value('id');

        if (!Auth::guard('employee')->attempt(['email' => $validated['email'], 'password' => $validated['password'], 'role_id' => $EmployeeRole])) {

            Session::flash('error', __('auth.failed'));
        } else {

            Session::regenerate();

            $this->redirectIntended(default: route('app.employee.dashboard', absolute: false), navigate: true);
        }
    }
    public function render()
    {
        return view('livewire.app.employee-account.employee-login');
    }
}
