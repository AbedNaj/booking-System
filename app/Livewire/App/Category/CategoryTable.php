<?php

namespace App\Livewire\App\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryTable extends Component
{
    use WithPagination;


    protected $listeners = ['categoryAdded' => '$refresh'];

    public function render()
    {
        $categories = Category::select('id', 'description', 'name')
            ->where('tenant_id', Auth::user()->tenant_id)
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('livewire.app.category.category-table', ['categories' => $categories]);
    }
}
