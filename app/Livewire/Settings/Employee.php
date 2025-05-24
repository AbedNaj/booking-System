<?php

namespace App\Livewire\Settings;

use App\Enums\SettingKey;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Employee extends Component
{

    public $password;

    public function saveEmployeeDefaults()
    {

        $validated =      $this->validate(['password' => ['string', 'max:120']]);

        Settings::createOrUpdateMany(
            [SettingKey::employeePassword->value   => ['tenant' =>  Auth::guard('employee')->user()->tenant_id, 'value' => $validated['password'], 'group' => SettingKey::employeePassword->group()]]
        );
    }
    public function render()
    {
        return view('livewire.settings.employee');
    }
}
