<?php

namespace App\Livewire\App\Services;

use App\Models\service_availabilities;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;
use Livewire\Component;

class ServiceAvailability extends Component
{
    public Service $service;
    public $availabilities = [];

    public $Availability = [];
    public $startTime = [];
    public $endTime = [];
    public function mount()
    {
        $this->availabilities = service_availabilities::select('id', 'day_of_week', 'start_time', 'end_time', 'is_available')
            ->where('service_id', $this->service->id)
            ->orderBy('day_of_week')
            ->get()
            ->map(function ($item) {
                $item->day_name = SupportCarbon::create()
                    ->locale(app()->getLocale())
                    ->startOfWeek(SupportCarbon::SUNDAY)
                    ->addDays($item->day_of_week)
                    ->dayName;

                return $item;
            });




        foreach ($this->availabilities as $availability) {
            $id = $availability->id;
            $this->Availability[$id] = $availability->is_available;
            $this->startTime[$id] = $availability->start_time;
            $this->endTime[$id] = $availability->end_time;
        }
    }

    public function getDaysName()
    {

        $this->availabilities->map(function ($item) {
            $item->day_name = SupportCarbon::create()
                ->locale(app()->getLocale())
                ->startOfWeek(SupportCarbon::SUNDAY)
                ->addDays($item->day_of_week)
                ->dayName;

            return $item;
        });
    }
    public function save()
    {

        foreach ($this->availabilities as $availability) {
            $id = $availability->id;

            service_availabilities::where('id', $id)->update([
                'is_available' => $this->Availability[$id] ?? false,
                'start_time' => $this->startTime[$id],
                'end_time' => $this->endTime[$id],
            ]);
        }

        $this->getDaysName();
        session()->flash('success', __('services.availabilityUpdateSuccess'));
    }

    public function setAllAvailable()
    {
        foreach ($this->Availability as $key => $availability) {

            $this->Availability[$key] = true;
        }
        $this->getDaysName();
    }

    public function setAllUnavailable()
    {
        foreach ($this->Availability as $key => $availability) {

            $this->Availability[$key] = false;
        }
        $this->getDaysName();
    }
    public function render()
    {
        return view('livewire.app.services.service-availability');
    }
}
