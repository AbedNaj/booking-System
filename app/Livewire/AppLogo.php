<?php

namespace App\Livewire;

use App\Enums\SettingKey;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AppLogo extends Component
{
    public $logoAddress;
    public $size = 24;
    public function mount()
    {

        $this->logoAddress = Settings::where('tenant_id', '=', Auth::user()->tenant_id)
            ->where('key', '=', SettingKey::Logo->value)
            ->value('value');
    }
    public function render()
    {
        return view('livewire.app-logo');
    }
}
