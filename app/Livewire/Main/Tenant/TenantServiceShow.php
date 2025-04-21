<?php

namespace App\Livewire\Main\Tenant;

use App\Mail\BookingConfirmationMail;
use App\Models\Assignment;
use App\Models\Booking;
use App\Models\Employee;
use App\Models\service_availabilities;
use App\Models\Service;
use App\Models\Tenant;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\Attributes\Layout;

use Illuminate\Support\Str;

#[layout('layouts.main')]
class TenantServiceShow extends Component
{


    public Service  $service;
    public $tenants;

    public $employees = [];
    public $datesToShow = [];
    public $timeslots = [];

    public  $employee_id;
    public $date, $start_time, $end_time;

    public function mount()
    {


        $this->availableEmployees();
        $this->getAvailableDays();
    }

    public function bookingConfirm($employee_id, $date, $start_time, $end_time)
    {

        $this->employee_id = $employee_id;
        $this->date = $date;
        $this->start_time = $start_time;
        $this->end_time = $end_time;

        $confirmation_code = Str::random(40);
        $this->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',

        ]);


        try {
            $booking = Booking::create([
                'employee_id' => $this->employee_id,
                'customer_id' => $this->customerID(),
                'service_id' => $this->service->id,
                'tenant_id' => $this->TenantID(),
                'date' => $this->date,
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
                'price' => $this->service->price,
                'duration' => $this->service->duration_minutes,
                'confirmation_code' =>  $confirmation_code,
            ]);



            Mail::to(auth()->guard('customer')->user()->email)->queue(new BookingConfirmationMail($booking));


            return redirect()->route('booking.pending', ['tenants' => $this->tenants]);
        } catch (\Exception $e) {
            logger()->error('Booking failed: ' . $e->getMessage());

            session()->flash('fail', 'Something went wrong. Please try again later.');
        }
    }

    public function availableEmployees()
    {

        $this->employees = Employee::where('status', 'active')
            ->whereHas('assignment', function ($q) {

                $q->where('service_id', $this->service->id);
            })
            ->get();
    }


    public function getAvailableDays()
    {
        $availableDays = service_availabilities::select('id', 'day_of_week', 'start_time', 'end_time')
            ->where('service_id', $this->service->id)
            ->where('is_available', true)
            ->get();

        $today = Carbon::today();

        for ($i = 1; $i <= 7; $i++) {

            $date = $today->copy()->addDays($i);
            $dayOfWeek = $date->dayOfWeek;
            if (in_array($dayOfWeek,  $availableDays->pluck('day_of_week')->toArray())) {
                $this->datesToShow[] = [
                    'id' => $availableDays->where('day_of_week', $dayOfWeek)->first()->id,
                    'day_name' => $date->locale('en')->translatedFormat('l'),
                    'day_number' => $date->format('d'),
                    'month_name' => $date->locale('en')->translatedFormat('F'),
                    'full_date' => $date->format('Y-m-d'),
                ];
            }
        }
    }

    public function getAvailableTimes($dateID)
    {
        $this->timeslots = [];
        $availableTimes = service_availabilities::select('start_time', 'end_time')
            ->where('id', $dateID)
            ->where('is_available', true)
            ->first();

        if ($availableTimes) {
            $startTime = Carbon::createFromFormat('H:i:s', $availableTimes->start_time);
            $endTime = Carbon::createFromFormat('H:i:s', $availableTimes->end_time);

            for ($time = $startTime; $time->lessThan($endTime); $time->addMinutes($this->service->duration_minutes)) {

                $this->timeslots[] = [
                    'start_time' => $time->format('H:i'),
                    'end_time' => $time->copy()->addMinutes($this->service->duration_minutes)->format('H:i'),
                ];
            }
        }
    }

    public function TenantID()
    {

        $id =  Tenant::where('slug', '=', $this->tenants)->first()->id;

        return $id;
    }

    public function customerID()
    {
        $id = auth()->guard('customer')->user()->customer->id;

        return $id;
    }



    public function render()
    {
        return view('livewire.main.tenant.tenant-service-show');
    }
}
