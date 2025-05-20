<?php

namespace App\Livewire\App\Dashboard;

use App\Charts\BookingChart;
use App\Enums\BookingStatusEnum;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{

    use WithPagination;

    public $totalBookings;
    public $confirmedBookings;
    public $todayBookings;
    public $cancelledBookings;


    public $labels = [];
    public $values = [];




    public function mount()
    {
        $this->getBookingStatus();

        $this->loadKbiData();
        $this->getUpbookingData();
    }

    public function getBookingStatus()
    {
        $this->labels = [];
        $this->values = [];

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $booking = Booking::select('date', 'status')->where('tenant_id', Auth::id())
            ->whereBetween('date', [$startOfWeek, $endOfWeek])
            ->where('status', BookingStatusEnum::CONFIRMED->value)
            ->get();

        for ($i = 0; $i < 7; $i++) {
            $date = $startOfWeek->copy()->addDays($i);

            $this->labels[] = $date->translatedFormat('l') . ' - ' . $date->format('Y-m-d');

            $count = $booking->filter(function ($item) use ($date) {
                return Carbon::parse($item->date)->toDateString() === $date->toDateString();
            })->count();

            $this->values[] = $count;
        }
    }

    public function getUpbookingData() {}

    public function loadKbiData()
    {

        $startOfThisWeek = Carbon::now()->startOfWeek();
        $endOfThisWeek   = Carbon::now()->endOfWeek();


        $startOfLastWeek = $startOfThisWeek->copy()->subWeek();
        $endOfLastWeek   = $endOfThisWeek->copy()->subWeek();

        $allBookings = Booking::select('date', 'status')->whereBetween('date', [$startOfThisWeek, $endOfThisWeek])
            ->where('tenant_id', Auth::user()->tenant_id)
            ->get();


        $this->totalBookings = $allBookings->count();
        $this->confirmedBookings = $allBookings->where('status', 'confirmed')->count();
        $this->todayBookings = $allBookings->where('date', '=', Carbon::today())->count();
        $this->cancelledBookings = $allBookings->where('status', 'cancelled')->count();
    }
    public function render()
    {
        $booking = Booking::select('id', 'tenant_id', 'customer_id', 'employee_id', 'service_id', 'start_time', 'status', 'date')
            ->where('tenant_id', Auth::guard('web')->user()->tenant_id)
            ->where('status', '=', BookingStatusEnum::CONFIRMED->value)
            ->where('date', '>=', now())
            ->with(['customer:id,name', 'employee:id,name', 'service:id,name'])
            ->latest()

            ->paginate(1);
        return view('livewire.app.dashboard.dashboard', ['bookings' => $booking]);
    }
}
