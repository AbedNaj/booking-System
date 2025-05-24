<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('setting.employee_heading')" :subheading="__('setting.employee_subheading')">
        <form wire:submit.prevent="saveEmployeeDefaults">



            <flux:input label="{{ __('setting.default_employee_password') }}" helper="" wire:model.defer="password" />



            <div class="mt-6">
                <flux:button type="submit">{{ __('setting.save') }}</flux:button>
            </div>
        </form>
    </x-settings.layout>
</section>
