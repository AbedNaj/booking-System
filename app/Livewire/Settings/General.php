<?php

namespace App\Livewire\Settings;

use App\Enums\SettingKey;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class General extends Component
{
    use WithFileUploads;
    public $temp = false;
    public $site_name, $site_email, $site_phone, $site_address;
    public $heading, $subheading, $project_desc;
    public $logo, $currentLogo;

    public $user;


    public function mount()
    {
        $this->user = Auth::user();
        $this->getGeneralData();
        $this->currentLogo();
        $this->getHeadingSettings();
    }
    public function saveGeneral()
    {

        $validated = $this->validate([
            'site_name' => 'nullable|string|max:255',
            'site_email' => 'nullable|email|max:255',
            'site_phone' => 'nullable|max:20',
            'site_address' => 'nullable|max:255',

        ]);


        Settings::createOrUpdateMany([
            SettingKey::siteName->value     => ['value' => $validated['site_name'], 'tenant' => $this->user->tenant_id, 'group' => SettingKey::siteName->group()],
            SettingKey::siteEmail->value    => ['value' => $validated['site_email'], 'tenant' => $this->user->tenant_id, 'group' => SettingKey::siteEmail->group()],
            SettingKey::sitePhone->value    => ['value' => $validated['site_phone'], 'tenant' => $this->user->tenant_id, 'group' => SettingKey::sitePhone->group()],
            SettingKey::siteAddress->value  => ['value' => $validated['site_address'], 'tenant' => $this->user->tenant_id, 'group' => SettingKey::siteAddress->group()],
        ]);
    }

    public function getGeneralData()
    {

        $settings = Settings::where('tenant_id', $this->user->tenant_id)
            ->where('group', SettingKey::siteName->group())
            ->get()
            ->pluck('value', 'key')
            ->toArray();

        $this->site_name = $settings[SettingKey::siteName->value] ?? '';
        $this->site_email = $settings[SettingKey::siteEmail->value] ?? '';
        $this->site_phone = $settings[SettingKey::sitePhone->value] ?? '';
        $this->site_address = $settings[SettingKey::siteAddress->value] ?? '';
    }
    public function currentLogo()
    {

        $this->currentLogo = Settings::where('tenant_id', $this->user->tenant_id)
            ->where('key', SettingKey::Logo->value)
            ->value('value');
    }
    public function saveLogo()
    {
        $teneantSlug = Auth::user()->tenant->slug;

        $logoPath = $this->logo
            ? $this->logo->store(env('DO_DIRECTORY') . "/tenant/{$teneantSlug}", 'do')
            : null;


        Settings::updateOrCreate(
            ['key' => SettingKey::Logo->value, 'tenant_id' => $this->user->tenant_id],

            ['value' => $logoPath, 'group' => SettingKey::Logo->group()]
        );
        $this->currentLogo();
    }
    public function headingSave()
    {
        $validated =   $this->validate([
            'heading' => 'nullable|string|max:255',
            'subheading' => 'nullable|string|max:255',
            'project_desc' => 'nullable|string|max:2000',

        ]);


        Settings::createOrUpdateMany([
            SettingKey::mainHeading->value => ['value' => $validated['heading'], 'tenant' => $this->user->tenant_id, 'group' =>   SettingKey::mainHeading->group()],
            SettingKey::subHeading->value => ['value' => $validated['subheading'], 'tenant' => $this->user->tenant_id, 'group' =>   SettingKey::mainHeading->group()],
            SettingKey::projectDesc->value => ['value' => $validated['project_desc'], 'tenant' => $this->user->tenant_id, 'group' =>   SettingKey::mainHeading->group()]
        ]);
    }

    public function getHeadingSettings()
    {
        $settings = Settings::where('tenant_id', '=', $this->user->tenant_id)
            ->where('group', '=', SettingKey::mainHeading->group())->get()
            ->pluck('value', 'key')->toArray();

        $this->heading = $settings[SettingKey::mainHeading->value] ?? '';
        $this->subheading = $settings[SettingKey::subHeading->value] ?? '';
        $this->project_desc = $settings[SettingKey::projectDesc->value] ?? '';
    }
    public function render()
    {
        return view('livewire.settings.general');
    }
}
