<?php

namespace App\Livewire\App\Services;

use App\Enums\ServiceStatus;
use App\Enums\SettingKey;
use App\Models\Category;
use App\Models\service_availabilities;
use App\Models\Service;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Ramsey\Uuid\Type\Decimal;

class ServiceCreate extends Component
{
    use WithFileUploads;
    public $categories = [];
    public string $name = '';
    public string $description = '';

    public string $price = '';

    public string $duration_minutes = '';

    public string $category = '';
    public string $status = 'active';

    public $statuses;
    public $image;

    public function getStatuses()
    {

        $this->statuses = ServiceStatus::cases();
    }
    public function mount()
    {

        $this->categories = Category::select('id', 'name')->where('tenant_id', '=', Auth::user()->tenant_id)->get();
        $this->getStatuses();
    }

    public function ServiceAdd()
    {


        $currentUser = Auth::user()->tenant_id;

        $settings = Settings::where('tenant_id', $currentUser)
            ->whereIn('key', [
                SettingKey::workingFrom->value,
                SettingKey::workingTo->value,
                SettingKey::allowCancel->value,
                SettingKey::CancelHours->value,
                SettingKey::CancelFees->value,
            ])
            ->pluck('value', 'key');

        $StartTime     = $settings[SettingKey::workingFrom->value] ?? '08:00:00';
        $EndTime       = $settings[SettingKey::workingTo->value] ?? '16:00:00';
        $allowCancel   = filter_var($settings[SettingKey::allowCancel->value] ?? false, FILTER_VALIDATE_BOOLEAN);

        $cancelHours   = $settings[SettingKey::CancelHours->value] ?? null;
        $cancelHours   = is_numeric($cancelHours) ? (int) $cancelHours : null;

        $cancelFees    = $settings[SettingKey::CancelFees->value] ?? null;
        $cancelFees    = is_numeric($cancelFees) ? (float) $cancelFees : null;

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'price' => ['numeric', 'required'],
            'duration_minutes' => ['numeric', 'nullable'],
            'category' =>  ['required', 'exists:categories,id'],
            'status' => ['required', 'in:active,inactive'],
        ]);



        $imagePath = $this->image
            ? $this->image->store(env('DO_DIRECTORY') . "/service/{$validated['name']}", 'do')
            : null;



        $srtvice =  Service::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'duration_minutes' => $validated['duration_minutes'],
            'category_id' => $validated['category'],
            'tenant_id' => $currentUser,
            'image' => $imagePath,
            'active' =>  $validated['status'],
            'allow_cancellation' => $allowCancel,
            'cancellation_hours_before' => $cancelHours,
            'cancellation_fee' => $cancelFees
        ]);

        for ($i = 0; $i < 7; $i++) {
            service_availabilities::create(
                [
                    'tenant_id' => $currentUser,
                    'service_id' => $srtvice->id,
                    'day_of_week' => $i,
                    'start_time' => $StartTime,
                    'end_time' => $EndTime,
                ]
            );
        }

        $this->dispatch('serviceAdd');

        $this->reset(['name', 'description', 'price', 'duration_minutes', 'category']);
    }
    public function render()
    {
        return view('livewire.app.services.service-create');
    }
}
