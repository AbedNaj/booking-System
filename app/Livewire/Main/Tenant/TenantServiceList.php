<?php

namespace App\Livewire\Main\Tenant;

use App\Models\Category;
use App\Models\Services;
use App\Models\Tenants;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[layout('layouts.main')]
class TenantServiceList extends Component
{
    public Tenants $tenants;
    public $categories = [];

    public $services = [];

    public function getCategoires()
    {

        $this->categories = Category::select('id', 'name')->where('tenants_id', $this->tenants->id)->get();
    }

    public function getServices()
    {
        $this->services = Services::select('id', 'name', 'description', 'image', 'price', 'duration_minutes', 'category_id')
            ->with('category:id,name')
            ->where('tenants_id', $this->tenants->id)
            ->where('status', 'active')
            ->get();
    }

    public function filterServices($categoryID)
    {

        $this->services = Services::select('id', 'name', 'description', 'image', 'price', 'duration_minutes', 'category_id')
            ->with('category:id,name')
            ->where('tenants_id', $this->tenants->id)
            ->where('status', 'active')
            ->where('category_id', $categoryID)
            ->get();
    }
    public function mount()
    {

        $this->getCategoires();
        $this->getServices();
    }
    public function render()
    {
        return view('livewire.main.tenant.tenant-service-list');
    }
}
