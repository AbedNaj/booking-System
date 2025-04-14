<?php

namespace App\Livewire\Auth;

use App\Models\Roles;
use App\Models\Tenants;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{

    public string $tenantName, $tenantEmail, $tenantPhone, $tenantAddress,
        $managerName, $managerEmail, $password, $password_confirmation;

    function arabic_slug($string)
    {
        $slug = preg_replace('/[^أ-يa-zA-Z0-9\s\-]/u', '', $string);
        $slug = preg_replace('/\s+/u', '-', $slug);
        return trim($slug, '-');
    }

    function generateUniqueSlug($name)
    {
        $slug = $this->arabic_slug($name);
        $original = $slug;
        $i = 1;

        while (Tenants::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $i;
            $i++;
        }

        return $slug;
    }
    public function register(): void
    {
        $validated = $this->validate([
            'tenantName' => ['required', 'string', 'max:255'],
            'tenantEmail' => ['nullable', 'string', 'lowercase', 'email', 'max:255'],
            'tenantPhone' => ['nullable', 'string', 'max:15'],
            'tenantAddress' => ['required', 'string', 'max:255'],
            'managerName' => ['required', 'string', 'max:255'],
            'managerEmail' => ['required', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed'],


        ]);

        $slug = $this->generateUniqueSlug($validated['tenantName']);
        $tenant = Tenants::create([
            'name' => $validated['tenantName'],
            'phone' => $validated['tenantPhone'],
            'address' => $validated['tenantAddress'],
            'email' => $validated['tenantEmail'],
            'slug' => $slug,
        ]);

        $role = Roles::select('id')->where('name', '=', 'admin')->get()->first();

        $validated['password'] = Hash::make($validated['password']);


        event(new Registered(($user = User::create([
            'password' =>   $validated['password'],
            'name' => $validated['managerName'],
            'email' => $validated['managerEmail'],
            'roles_id' => $role['id'],
            'tenants_id' =>  $tenant['id'],

        ]))));

        Auth::guard('web')->login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}
