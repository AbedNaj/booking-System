<?php

namespace App\Livewire\Auth;

use App\Models\Roles;
use App\Models\Tenants;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public string $address = '';
    public string $password = '';

    public string $password_confirmation = '';


    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed'],
            'phone' => ['nullable', 'string', 'max:15'],
            'address' => ['nullable', 'string', 'max:255'],
        ]);

        $tenant = Tenants::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],

            'address' => $validated['address'],
        ]);

        $role = Roles::select('id')->where('name', '=', 'admin')->get()->first();

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create([
            'password' =>   $validated['password'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'roles_id' => $role['id'],
            'tenants_id' =>  $tenant['id'],

        ]))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}
