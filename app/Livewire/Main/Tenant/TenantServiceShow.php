<?php

namespace App\Livewire\Main\Tenant;

use App\Models\Assignment;
use App\Models\Employees;
use App\Models\service_availabilities;
use App\Models\Services;
use Aws\Api\Service;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[layout('layouts.main')]
class TenantServiceShow extends Component
{


    public Services  $service;
    public $employees = [];


    public $datesToShow = [];
    public $timeslots = [];

    public function availableEmployees()
    {

        $this->employees = Employees::where('status', 'active')
            ->whereHas('assignment', function ($q) {

                $q->where('services_id', $this->service->id);
            })
            ->get();
    }


    public function getAvailableDays()
    {
        $availableDays = service_availabilities::select('id', 'day_of_week', 'start_time', 'end_time')
            ->where('services_id', $this->service->id)
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
                    'end_time' => $time->copy()->addMinutes(30)->format('H:i'),
                ];
            }
        }
    }
    public function getServiceProperty()
    {
        return Services::find($this->service->id);
    }

    public function getServiceAvailabilityProperty()
    {
        return service_availabilities::where('services_id', $this->service->id)->get();
    }
    public function mount()
    {

        $this->availableEmployees();
        $this->getAvailableDays();
    }
    public function render()
    {
        return view('livewire.main.tenant.tenant-service-show');
    }
}
