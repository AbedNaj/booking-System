<?php

namespace App\Livewire\App\EmployeeAccount;

use App\Models\Booking;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Livewire\Attributes\Layout;

#[Layout('layouts.employee-account')]
class EmployeeBookings extends Component
{
    public $bookings;

    public $categories;

    public $selectedCategory;

    public $tab = 'all';
    public $viewStyle = 'grid';

    public function filterBookings()
    {
        $today = Carbon::today();

        $query = Booking::select('id', 'customer_id', 'service_id', 'date', 'start_time', 'end_time', 'duration', 'price', 'status')
            ->with('service:id,name')
            ->with('customer:id,name,phone')
            ->where('employee_id', Auth::guard('employee')->user()->employee->id);


        match ($this->tab) {
            'upcoming' => $query->whereDate('date', '>', $today),
            'past'     => $query->whereDate('date', '<', $today),
            'today'    => $query->whereDate('date', '=', $today),
            default    => null,
        };


        if ($this->selectedCategory) {
            $query->whereHas('service.category', function ($q) {
                $q->where('id', $this->selectedCategory);
            });
        }

        $this->bookings = $query->orderByDesc('date')->get();
    }

    public function updatedTab()
    {

        $this->filterBookings();
    }


    public function updatedSelectedCategory()
    {

        $this->filterBookings();
    }



    public function mount()
    {


        $this->categories = Category::select('id', 'name')->where('tenant_id', '=', Auth::guard('employee')->user()->tenant_id)->get();
        $this->filterBookings();
    }
    public function render()
    {
        return view('livewire.app.employee-account.employee-bookings');
    }
}
