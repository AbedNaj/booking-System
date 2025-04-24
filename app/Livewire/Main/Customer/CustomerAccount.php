<?php

namespace App\Livewire\Main\Customer;

use App\Models\Customer;
use App\Models\Role;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[layout('layouts.main')]
class CustomerAccount extends Component
{

    public $tenants;
    public $name, $phone, $email;

    public $user;
    public function mount()
    {
        $this->user = Auth::guard('customer')->user();
        $this->name = $this->user->name;
        $this->phone = $this->user->customer->phone;
        $this->email = $this->user->email;
    }

    public function save()
    {
        $customerRole = Role::select('id')->where('name', 'customer')->first();
        $currentTenant = Tenant::select('id')->where('slug', $this->tenants)->first();

        $validated = $this->validate([
            'name' => 'string|max:100|required',
            'phone' => 'numeric|required',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')
                    ->where('role_id', $customerRole->id)
                    ->where('tenant_id', $currentTenant->id)
                    ->ignore($this->user->id),
            ],
        ]);


        $this->user->customer->update([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
        ]);


        $this->user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);
    }

    public function render()
    {
        return view('livewire.main.customer.customer-account');
    }
}
