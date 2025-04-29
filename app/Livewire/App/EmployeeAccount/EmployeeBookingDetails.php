<?php

namespace App\Livewire\App\EmployeeAccount;

use App\Models\Booking;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.employee-account')]
class EmployeeBookingDetails extends Component
{
    public Booking $booking;

    public function mount()
    {
        $this->booking->load('customer:name,id,phone,notes', 'service:name,id', 'employee:name,id');
    }
    public function render()
    {
        return view('livewire.app.employee-account.employee-booking-details');
    }
}
