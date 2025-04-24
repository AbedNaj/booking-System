<?php

namespace App\Livewire\Main\Auth;

use App\Models\Role;
use App\Models\Tenant;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[layout('layouts.main')]
class Login extends Component
{
    public $email;
    public $password;

    public $tenants;
    public function login()
    {
        $customerRole = Role::select('id')->where('name', 'customer')->first();
        $tenantID = Tenant::select('id')->where('slug', $this->tenants)->first();
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (auth('customer')->attempt(
            [
                'email' => $this->email,
                'password' => $this->password,
                'tenant_id' =>  $tenantID->id,
                'role_id' => $customerRole->id,
            ]
        )) {
            Session::regenerate();
            $this->redirectIntended(route('tenant.service.list', ['tenants' => $this->tenants], false), true);
        } else {
            session()->flash('error', 'Invalid credentials.');
        }
    }

    public function mount() {}
    public function render()
    {
        return view('livewire.main.auth.login');
    }
}
