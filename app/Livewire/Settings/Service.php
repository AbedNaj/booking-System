<?php

namespace App\Livewire\Settings;

use App\Enums\SettingKey;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Service extends Component
{
    public $user;
    public $cancel_hours, $cancel_fees, $work_from, $work_to, $cancel_policy, $allow_cancellation;
    public function saveBookingDefaults()
    {
        $validated =  $this->validate(
            [
                'cancel_hours' => 'nullable|integer|min:0|max:168',
                'cancel_fees' => 'nullable|numeric|min:0|max:9999.99',
                'allow_cancellation' => 'nullable|boolean',
                'work_from' => 'nullable|date_format:H:i',
                'work_to'   => 'nullable|date_format:H:i|after:work_from',
                'cancel_policy' => 'nullable|string|max:1000'

            ]
        );


        Settings::createOrUpdateMany([

            SettingKey::CancelHours->value => ['value' => $validated['cancel_hours'], 'tenant' => $this->user->tenant_id, 'group' =>  SettingKey::CancelHours->group()],
            SettingKey::CancelFees->value => ['value' => $validated['cancel_fees'], 'tenant' => $this->user->tenant_id, 'group' =>  SettingKey::CancelFees->group()],
            SettingKey::workingFrom->value => ['value' => $validated['work_from'], 'tenant' => $this->user->tenant_id, 'group' =>  SettingKey::workingFrom->group()],
            SettingKey::workingTo->value => ['value' => $validated['work_to'], 'tenant' => $this->user->tenant_id, 'group' =>  SettingKey::workingTo->group()],
            SettingKey::allowCancel->value => ['value' => $validated['allow_cancellation'], 'tenant' => $this->user->tenant_id, 'group' =>  SettingKey::allowCancel->group()],
            SettingKey::cancelPolicy->value => ['value' => $validated['cancel_policy'], 'tenant' => $this->user->tenant_id, 'group' =>  SettingKey::cancelPolicy->group()],
        ]);
    }

    public function getSettingsData()
    {

        $settings = Settings::where('tenant_id', '=', $this->user->tenant_id)->where('group', '=', SettingKey::CancelHours->group())
            ->pluck('value', 'key');

        $this->cancel_hours = $settings[SettingKey::CancelHours->value] ?? '';
        $this->cancel_fees = $settings[SettingKey::CancelFees->value] ?? '';
        $this->work_from = $settings[SettingKey::workingFrom->value] ?? '';
        $this->work_to = $settings[SettingKey::workingTo->value] ?? '';
        $this->cancel_policy = $settings[SettingKey::cancelPolicy->value] ?? '';

        $this->allow_cancellation = isset($settings[SettingKey::allowCancel->value])
            ? (bool) $settings[SettingKey::allowCancel->value]
            : false;
    }

    public function mount()
    {

        $this->user = Auth::guard('web')->user();

        $this->getSettingsData();
    }
    public function render()
    {
        return view('livewire.settings.service');
    }
}
