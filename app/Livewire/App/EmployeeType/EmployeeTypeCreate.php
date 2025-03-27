<?php

namespace App\Livewire\App\EmployeeType;

use App\Models\EmployeeTypes;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmployeeTypeCreate extends Component
{
    public string $name = '';
    public string $description = '';

    public function TypeAdd()
    {

        $validated = $this->validate([
            'name' => ['string', 'required'],
            'description' => ['string', 'nullable'],
        ]);
        $tenant = Auth::user()->tenants_id;
        EmployeeTypes::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'tenants_id' => $tenant
        ]);
        $this->dispatch('employeeTypeAdd');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.app.employee-type.employee-type-create');
    }
}
