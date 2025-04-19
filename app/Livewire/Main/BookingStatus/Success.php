<?php

namespace App\Livewire\Main\BookingStatus;

use Livewire\Component;
use Livewire\Attributes\Layout;


#[layout('layouts.main')]
class Success extends Component
{
    public function render()
    {
        return view('livewire.main.booking-status.success');
    }
}
