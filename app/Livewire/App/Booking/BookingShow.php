<?php

namespace App\Livewire\App\Booking;

use App\Models\Booking;
use Carbon\Carbon;
use Livewire\Component;

class BookingShow extends Component
{
    public Booking $booking;
    public $cancellationDeadline;
    public $isCanncellationAllowed;

    public function mount()
    {
        $this->booking->load('customer:name,id,phone,notes', 'service:name,id,allow_cancellation,cancellation_hours_before', 'employee:name,id');
        $this->checkCancellation();
    }

    public function checkCancellation()
    {
        $bookingDate = Carbon::parse("{$this->booking->date} {$this->booking->start_time}");

        $this->cancellationDeadline = $bookingDate->subHours($this->booking->service->cancellation_hours_before);

        $isTimeBefore = Carbon::now()->isBefore($this->cancellationDeadline);

        if (in_array($this->booking->status, ['pending', 'confirmed'])  && $isTimeBefore == true && $this->booking->service->allow_cancellation == true) {
            $this->isCanncellationAllowed = true;
        } else {
            $this->isCanncellationAllowed = false;
        }
    }

    public function cancelBooking()
    {
        $this->booking->update(['status' => 'cancelled']);
        $this->checkCancellation();
    }
    public function render()
    {
        return view('livewire.app.booking.booking-show');
    }
}
