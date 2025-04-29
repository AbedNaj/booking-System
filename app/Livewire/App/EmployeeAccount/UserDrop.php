<?php

namespace App\Livewire\App\EmployeeAccount;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDrop extends Component
{
    public $userName;
    public function mount()
    {
        $this->userName = Auth::guard('employee')->user()->name;
    }
    public function logout()
    {

        Auth::guard('employee')->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('app.employee.login');
    }
    public function render()
    {
        return view('livewire.app.employee-account.user-drop');
    }
}
