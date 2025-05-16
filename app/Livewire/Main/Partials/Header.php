<?php

namespace App\Livewire\Main\Partials;

use App\Enums\SettingKey;
use App\Models\Settings;
use App\Models\Tenant;
use AWS\CRT\HTTP\Request;
use Livewire\Component;

class Header extends Component
{

    public $logoURL;

    public function mount()
    {

        $tenant_id = Tenant::where('slug', '=', request()->segment(1))->value('id');

        $this->logoURL = Settings::where('tenant_id', '=', $tenant_id)
            ->where('key', '=', SettingKey::Logo)->value('value');
    }
    public function render()
    {
        return view('livewire.main.partials.header');
    }
}
