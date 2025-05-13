<?php

namespace App\Livewire\App\Dashboard;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{

    public array $kbis = [];

    public function mount()
    {
        // هذا الأسبوع
        $startOfThisWeek = Carbon::now()->startOfWeek();  // الإثنين هذا الأسبوع
        $endOfThisWeek   = Carbon::now()->endOfWeek();    // الأحد هذا الأسبوع

        // الأسبوع الماضي
        $startOfLastWeek = $startOfThisWeek->copy()->subWeek(); // الإثنين الماضي
        $endOfLastWeek   = $endOfThisWeek->copy()->subWeek();   // الأحد الماضي

        $thisWeekCount = Booking::where('status', 'confirmed')
            ->whereBetween('date', [$startOfThisWeek, $endOfThisWeek])
            ->where('tenant_id', '=', Auth::user()->tenant_id)->count();



        $this->kbis['total_bookings'] = $thisWeekCount;
    }
    public function render()
    {
        return view('livewire.app.dashboard.dashboard');
    }
}
