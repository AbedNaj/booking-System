<?php

namespace App\Livewire\App\Customers;

use App\Enums\CustomerStatus;
use Livewire\Component;

class CustomersIndex extends Component
{
    public $status;

    public $statusOptions;

    public function mount()
    {
        $this->statusOptions = CustomerStatus::cases();
    }
    public function render()
    {
        return view('livewire.app.customers.customers-index');
    }
}
