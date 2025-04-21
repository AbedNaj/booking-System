<?php

namespace App\Livewire\Main\BookingStatus;

use App\Models\Booking;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[layout('layouts.main')]


class BookingConfirmation extends Component
{
    public $tenants;
    public $confirmation_code;
    public  $booking;
    public function mount()
    {

        $this->booking = Booking::where('confirmation_code', '=', $this->confirmation_code)
            ->first();

        if (!$this->booking) {
            abort(403, 'This confirmation link is no longer valid or has already been confirmed.');
        }

        if ($this->booking['status'] === 'pending') {
            $this->booking->update([

                'status' => 'confirmed',
                'confirmation_code' => null,
            ]);
        }
    }
    public function render()
    {
        return view('livewire.main.booking-status.booking-confirmation');
    }
}
