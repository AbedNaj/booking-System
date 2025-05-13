<?php

namespace App\Livewire\App\Booking;

use App\Enums\BookingStatusEnum;
use App\Models\Booking;
use Livewire\Component;

class BookingIndex extends Component
{

    public $statusOptions = [];

    public $selectedStatus;

    public $dateFrom, $dateTo;
    public $serviceSearch, $employeeSearch, $customerSearch;

    public function getStatus()
    {

        $this->statusOptions = BookingStatusEnum::cases();
    }

    public function mount()
    {

        $this->getStatus();
    }
    public function render()
    {
        return view('livewire.app.booking.booking-index');
    }
}
