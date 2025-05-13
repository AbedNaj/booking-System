<?php

namespace App\Livewire\App\Customers;

use App\Models\Customer;
use App\Models\Role;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CustomerCreate extends Component
{

    public $name, $email, $phone, $address, $notes;
    public $password;

    public function customerAdd()
    {

        $customerRole = Role::select('id')->where('name', 'customer')->first();
        $currentTenant = Auth::user()->tenant_id;


        $validated = $this->validate([
            'notes' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')
                    ->where('role_id', $customerRole->id)
                    ->where('tenant_id', $currentTenant),
            ],
            'password' => 'required|string',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        $hashedPassword = Hash::make($validated['password']);
        $user =   User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $hashedPassword,
            'role_id' => $customerRole->id,
            'tenant_id' => $currentTenant,

        ]);

        Customer::create([
            'name' => $validated['name'],
            'user_id' => $user->id,
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'tenant_id' => $currentTenant,
            'notes' => $validated['notes'],

        ]);

        $this->dispatch('customerAdd');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.app.customers.customer-create');
    }
}
