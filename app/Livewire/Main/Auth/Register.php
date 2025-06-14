<?php

namespace App\Livewire\Main\Auth;

use App\Models\Customer;
use App\Models\Role;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Validation\Rule;

#[layout('layouts.main')]
class Register extends Component
{


    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $phone;

    public $address;

    public String $tenants;


    public function register()
    {

        $customerRole = Role::select('id')->where('name', 'customer')->first();
        $currentTenant = Tenant::select('id')->where('slug', $this->tenants)->first();


        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')
                    ->where('role_id', $customerRole->id)
                    ->where('tenant_id', $currentTenant->id),
            ],
            'password' => 'required|string|confirmed',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        $hashedPassword = Hash::make($validated['password']);
        $user =   User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $hashedPassword,
            'role_id' => $customerRole->id,
            'tenant_id' => $currentTenant->id,

        ]);

        Customer::create([
            'name' => $validated['name'],
            'user_id' => $user->id,
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'tenant_id' => $currentTenant->id,

        ]);

        redirect()->route('customer.login', ['tenants' => $this->tenants])->with('success', 'Registration successful. Please login.');
    }

    public function mount() {}

    public function render()
    {
        return view('livewire.main.auth.register');
    }
}
