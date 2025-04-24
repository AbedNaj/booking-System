<?php

namespace App\Livewire\Main;

use App\Models\Tenant;
use Livewire\Component;

class HeaderProfileMenu extends Component
{

    public $tenants;

    public function mount()
    {

        $routeTenant = request()->route('tenants');


        if (is_string($routeTenant)) {
            $this->tenants = Tenant::where('slug', $routeTenant)->first();
        } else {
            $this->tenants = $routeTenant;
        }
    }
    public function signOut()
    {
        auth()->guard('customer')->logout();
        session()->invalidate();
        session()->regenerateToken();
        session()->flash('message', 'You have been logged out.');
    }
    public function render()
    {
        return view('livewire.main.header-profile-menu');
    }
}
