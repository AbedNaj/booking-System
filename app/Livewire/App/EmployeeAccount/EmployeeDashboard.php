<?php

namespace App\Livewire\App\EmployeeAccount;

use Livewire\Component;

use Livewire\Attributes\Layout;

#[Layout('layouts.employee-account')]
class EmployeeDashboard extends Component
{
    public function render()
    {
        return view('livewire.app.employee-account.employee-dashboard');
    }
}
