<?php

namespace App\Livewire\App\EmployeeAccount;

use App\Enums\BookingStatusEnum;
use App\Models\Booking;
use Livewire\Component;

class BookingNeedUpdate extends Component
{
    public $bookingsNeedUpdate;

    public $employeeID;
    public function getBookingsNeedUpdate()
    {

        $this->bookingsNeedUpdate = Booking::select('id', 'customer_id', 'service_id',  'date', 'start_time', 'end_time')
            ->with(['customer:id,name', 'service:id,name'])

            ->where('employee_id', '=', $this->employeeID)
            ->where('status', '=', BookingStatusEnum::CONFIRMED->value)
            ->whereRaw("STR_TO_DATE(CONCAT(date, ' ', end_time), '%Y-%m-%d %H:%i:%s') <= ?", [now()])
            ->orderByRaw('date')
            ->limit(20)
            ->get();
    }

    public function setNoShow($bookingID)
    {


        $booking = Booking::where('id', $bookingID)
            ->where('employee_id', $this->employeeID)
            ->firstOrFail();

        $booking->update([
            'status' => BookingStatusEnum::NO_SHOW->value
        ]);

        $this->getBookingsNeedUpdate();
    }

    public function setCompleted($bookingID)
    {

        $booking = Booking::where('id', $bookingID)
            ->where('employee_id', $this->employeeID)
            ->firstOrFail();

        $booking->update([
            'status' => BookingStatusEnum::COMPLETED->value
        ]);

        $this->getBookingsNeedUpdate();
    }
    public function mount()
    {
        $this->employeeID = auth()->guard('employee')->user()->employee->id;
        $this->getBookingsNeedUpdate();
    }
    public function render()
    {

        return view('livewire.app.employee-account.booking-need-update');
    }
}
