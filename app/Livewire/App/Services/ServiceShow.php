<?php

namespace App\Livewire\App\Services;

use App\Models\Category;
use Livewire\WithFileUploads;

use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ServiceShow extends Component
{
    use WithFileUploads;
    public Service $service;
    public array $form = [];

    public  $categories = [];
    public bool $editing = false;

    public $image;
    public function mount(Service $service)
    {
        $this->service = $service->load('category');

        $this->form = $this->service->toArray();

        $this->categories = Category::select('id', 'name')->where('tenant_id', Auth::user()->tenant_id)->get();
    }

    public function save()
    {


        $validated = $this->validate([
            'form.name' => ['required', 'string', 'max:255'],
            'form.description' => ['nullable', 'string', 'max:500'],
            'form.price' => ['required', 'numeric', 'min:0'],
            'form.duration_minutes' => ['nullable', 'integer', 'min:1'],
            'form.max_bookings_per_day' => ['nullable', 'integer', 'min:1'],
            'form.status' => ['required', 'in:active,inactive'],
            'form.category_id' => ['required', 'exists:categories,id']

        ]);

        if ($this->image) {
            $imagePath = $this->image->store(env('DO_DIRECTORY') . "/service/{$validated['form']['name']}", 'do');

            $this->service->update(['image' => $imagePath]);
        }

        $this->service->update([
            'name' => $validated['form']['name'],
            'description' => $validated['form']['description'],
            'price' => $validated['form']['price'],
            'duration_minutes' => $validated['form']['duration_minutes'],
            'max_bookings_per_day' => $validated['form']['max_bookings_per_day'],
            'status' => $validated['form']['status'],
            'category_id' => $validated['form']['category_id']
        ]);


        $this->editing = false;
        session()->flash('success', __('category.update'));
    }

    public function enableEdit()
    {

        $this->editing = true;
    }
    public function render()
    {
        return view('livewire.app.services.service-show');
    }
}
