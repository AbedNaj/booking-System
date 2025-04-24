<?php

namespace App\Livewire\Main\Customer;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[layout('layouts.main')]
class CustomerBookings extends Component
{

    public $user;
    public $bookings;
    public $selectedBooking = [];
    public $bookingCount;
    public function mount()
    {

        $this->user = Auth::guard('customer')->user();


        $this->bookings = Booking::select('id', 'date', 'status', 'service_id', 'customer_id', 'start_time', 'end_time')
            ->with('service:id,name')

            ->where('customer_id', '=', $this->user->customer->id)->get();

        $this->bookingCount = $this->bookings->count();
    }



    public function openBookingModal($bookingId)
    {
        $booking = Booking::with('service:id,name', 'employee:id,name')
            ->select('id', 'service_id', 'employee_id', 'date', 'start_time', 'end_time', 'duration', 'price', 'status', 'payment_status')
            ->findOrFail($bookingId);

        $this->selectedBooking = [
            'id' => $booking->id,
            'service' => $booking->service->name,
            'employee' => $booking->employee->name ?? '',
            'date' => $booking->date,
            'start_time' => $booking->start_time,
            'end_time' => $booking->end_time,
            'duration' => $booking->duration,
            'price' => $booking->price,
            'status' => $booking->status,
            'payment_status' => $booking->payment_status,
        ];
    }


    public function render()
    {
        return view('livewire.main.customer.customer-bookings');
    }
}
