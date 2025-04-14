<?php

namespace App\Livewire\Main;

use Livewire\Component;

class HeaderProfileMenu extends Component
{

    public function signOut()
    {
        auth()->guard('customer')->logout();
        session()->flash('message', 'You have been logged out.');
    }
    public function render()
    {
        return view('livewire.main.header-profile-menu');
    }
}
