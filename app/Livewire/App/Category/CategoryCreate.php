<?php

namespace App\Livewire\App\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class CategoryCreate extends Component
{
    public String $name = '';
    public String $description = '';

    public function catrgoryAdd()
    {

        $tenant = Auth::user()->tenants_id;

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],

        ]);

        Category::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'tenants_id' => $tenant
        ]);

        $this->dispatch('categoryAdded');

        $this->reset(['name', 'description']);
    }
    public function render()
    {
        return view('livewire.app.category.category-create');
    }
}
