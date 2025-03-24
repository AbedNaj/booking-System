<?php

namespace App\Livewire\App\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryAdd extends Component
{
    public String $name = '';
    public String $description = '';
    public $categoryId;
    protected $listeners = ['openEditCategory' => 'loadCategory'];

    public function loadCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $this->categoryId = $categoryId;
        $this->name = $category->name;
        $this->description = $category->description;


        $this->dispatchBrowserEvent('open-slide-over');
    }

    public function render()
    {
        return view('livewire.app.category.category-add');
    }
}
