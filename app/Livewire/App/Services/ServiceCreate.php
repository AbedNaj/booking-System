<?php

namespace App\Livewire\App\Services;

use App\Models\Category;
use App\Models\service_availabilities;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

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
    public $image;
    public function mount()
    {

        $this->categories = Category::select('id', 'name')->where('tenants_id', '=', Auth::user()->tenants_id)->get();
    }

    public function ServiceAdd()
    {
        $currentUser = Auth::user()->tenants_id;



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



        $srtvice =  Services::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'duration_minutes' => $validated['duration_minutes'],
            'category_id' => $validated['category'],
            'tenants_id' => $currentUser,
            'image' => $imagePath,
            'active' =>  $validated['status'],
        ]);

        for ($i = 0; $i < 7; $i++) {
            service_availabilities::create(
                [
                    'tenants_id' => $currentUser,
                    'services_id' => $srtvice->id,
                    'day_of_week' => $i,
                    'start_time' => '00:00:00',
                    'end_time' => '23:59:59',
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
