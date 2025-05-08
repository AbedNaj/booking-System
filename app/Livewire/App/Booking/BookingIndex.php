<?php

namespace App\Livewire\App\Booking;

use App\Models\Booking;
use Livewire\Component;

class BookingIndex extends Component
{



    public function mount() {}
    public function render()
    {
        return view('livewire.app.booking.booking-index');
    }
}
