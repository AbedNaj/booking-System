<?php

namespace App\Livewire\Main\Tenant;

use App\Enums\SettingKey;
use App\Models\Settings;
use App\Models\Tenant;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[layout('layouts.main')]
class TenantHome extends Component
{

    public $siteSettings = [];
    public $tenants;


    public function mount()
    {
        $tenantID = Tenant::where('slug', '=', $this->tenants)->value('id');
        $this->siteSettings = Settings::select('key', 'value')
            ->where('tenant_id', $tenantID)
            ->whereIn('group', [
                SettingKey::Logo->group(),
                SettingKey::siteName->group(),
                SettingKey::mainHeading->group()
            ])->pluck('value', 'key');
    }


    public function render()
    {
        return view('livewire.main.tenant.tenant-home');
    }
}
