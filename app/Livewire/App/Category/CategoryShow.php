<?php

namespace App\Livewire\App\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryShow extends Component
{
    public Category $category;
    public bool $editing = false;
    public string $name = '';
    public string $description = '';

    public function enableEdit()
    {
        $this->name = $this->category->name;
        $this->description = $this->category->description;
        $this->editing = true;
    }
    public function delete()
    {
        $this->category->delete();
        return redirect()->route('app.category.index');
    }

    public function save()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        $this->category->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->editing = false;
        session()->flash('success', __('category.update'));
    }
    public function render()
    {
        return view('livewire.app.category.category-show');
    }
}
