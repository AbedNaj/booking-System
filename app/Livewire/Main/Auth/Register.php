<?php

namespace App\Livewire\Main\Auth;

use App\Models\Customers;
use App\Models\Roles;
use App\Models\Tenants;
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

        $customerRole = Roles::select('id')->where('name', 'customer')->first();
        $currentTenant = Tenants::select('id')->where('slug', $this->tenants)->first();


        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')
                    ->where('roles_id', $customerRole->id)
                    ->where('tenants_id', $currentTenant->id),
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
            'roles_id' => $customerRole->id,
            'tenants_id' => $currentTenant->id,

        ]);

        Customers::create([
            'name' => $validated['name'],
            'user_id' => $user->id,
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'tenants_id' => $currentTenant->id,
            'last_booking_at' => now(),
        ]);

        redirect()->route('customer.login', ['tenants' => $this->tenants])->with('success', 'Registration successful. Please login.');
    }

    public function mount() {}

    public function render()
    {
        return view('livewire.main.auth.register');
    }
}
