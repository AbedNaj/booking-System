<?php

namespace App\Livewire\App\Customers;

use App\Models\Customers;
use Livewire\Component;

class CustomersShow extends Component
{

    public $editing = false;
    public Customers $customer;

    public ?string $name, $email, $phone, $address, $notes;
    public int $totalBookings;
    public $lastBookingDate;
    public function enableEdit()
    {

        $this->name = $this->customer->name;
        $this->email = $this->customer->email;
        $this->phone = $this->customer->phone;
        $this->address = $this->customer->address;
        $this->notes = $this->customer->notes;
        $this->totalBookings = $this->customer->total_bookings;
        $this->lastBookingDate = $this->customer->last_booking_at;
        $this->editing = true;
    }


    public function save()
    {
        $validated =    $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
            'totalBookings' => ['nullable', 'integer'],
            'lastBookingDate' => ['nullable', 'date'],

        ]);

        $this->customer->update([
            'name' => $validated['name'],
            'email' =>  $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'notes' =>  $validated['notes'],
            'total_bookings' =>  $validated['totalBookings'],
            'last_booking_at' =>  $validated['lastBookingDate'],
        ]);

        $this->editing = false;
        session()->flash('success', __('customers.updateSuccess'));
    }
    public function render()
    {
        return view('livewire.app.customers.customers-show');
    }
}
