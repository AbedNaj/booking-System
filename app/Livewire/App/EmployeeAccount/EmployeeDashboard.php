<?php

namespace App\Livewire\App\EmployeeAccount;

use App\Enums\BookingStatusEnum;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Livewire\Attributes\Layout;

#[Layout('layouts.employee-account')]
class EmployeeDashboard extends Component
{

    public $todayBookings, $FutureBookings, $canceledBookings, $completedBookings;
    public $nextBooking;
    public $employeeID;

    public $bookingsNeedUpdate;

    public function mount()
    {
        $this->employeeID = Auth::guard('employee')->user()->employee->id;
        $this->getKbiData();
        $this->getBookingsNeedUpdate();
    }

    public function getKbiData()
    {
        $todayDate = Carbon::today()->toDateString();
        $allBookings = Booking::select('date', 'status', 'start_time')
            ->where('tenant_id', Auth::user()->tenant_id)
            ->where('employee_id', '=', $this->employeeID)
            ->get();


        $this->nextBooking = $allBookings->sortBy(['date', 'start_time'])
            ->where('date', '>=', $todayDate)
            ->where('status', '=', BookingStatusEnum::CONFIRMED->value)->first();

        $this->todayBookings = $allBookings->where('date', '=', $todayDate)
            ->where('status', '=', BookingStatusEnum::CONFIRMED->value)->count();

        $this->FutureBookings = $allBookings->where('date', '>', $todayDate)
            ->where('status', '=', BookingStatusEnum::CONFIRMED->value)->count();

        $this->canceledBookings = $allBookings->where('status', '=', BookingStatusEnum::CANCELLED->value)
            ->count();
        $this->completedBookings = $allBookings->where('status', '=', BookingStatusEnum::COMPLETED->value)->count();
    }

    public function getBookingsNeedUpdate()
    {

        $this->bookingsNeedUpdate = Booking::select('id', 'customer_id', 'service_id',  'date', 'start_time', 'end_time')
            ->with(['customer:id,name', 'service:id,name'])
            ->where('tenant_id', Auth::user()->tenant_id)
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
    public function render()
    {

        $booking = Booking::select('id', 'tenant_id', 'customer_id', 'employee_id', 'service_id', 'start_time', 'status', 'date')
            ->where('tenant_id', Auth::guard('employee')->user()->tenant_id)
            ->where('employee_id', '=', Auth::guard('employee')->user()->Employee->id)
            ->where('status', '=', BookingStatusEnum::CONFIRMED->value)
            ->where('date', '>=', Carbon::today()->toDateString())
            ->with(['customer:id,name', 'service:id,name'])
            ->orderByDesc('date')

            ->paginate(5);
        return view('livewire.app.employee-account.employee-dashboard', ['bookings' => $booking]);
    }
}
