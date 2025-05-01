<?php

namespace App\Livewire\App\EmployeeAccount;

use App\Models\Booking;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.employee-account')]
class EmployeeBookingDetails extends Component
{
    public Booking $booking;


    public $isCanncellationAllowed;
    public $cancellationDeadline;
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

        if ($this->booking->status == 'pending' && $isTimeBefore == true && $this->booking->service->allow_cancellation == true) {
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
        return view('livewire.app.employee-account.employee-booking-details');
    }
}
