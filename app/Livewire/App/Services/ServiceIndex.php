<?php

namespace App\Livewire\App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ServiceIndex extends Component
{







    public function render()
    {
        return view('livewire.app.services.service-index');
    }
}
