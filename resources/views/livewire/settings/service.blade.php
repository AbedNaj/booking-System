<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('setting.serviceTitle')" :subheading="__('setting.serviceDescription')">
        <form wire:submit.prevent="saveBookingDefaults">
            <div class="mb-6 space-y-2">
                <h3 class="text-l font-semibold text-gray-900 dark:text-white">
                    {{ __('setting.service_defaults') }}
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    {{ __('setting.service_defaults_helper') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <flux:input type="number" label="{{ __('setting.default_cancellation_notice_hours') }}" placeholder="4"
                    helper="{{ __('setting.default_cancellation_notice_hours_helper') }}"
                    wire:model.defer="cancel_hours" />

                <flux:input type="number" step="0.01" label="{{ __('setting.default_cancellation_fees') }}"
                    placeholder="0.00" helper="{{ __('setting.default_cancellation_fees_helper') }}"
                    wire:model.defer="cancel_fees" />

                <flux:input type="time" label="{{ __('setting.default_working_hour_from') }}"
                    helper="{{ __('setting.default_working_hour_from_helper') }}" wire:model.defer="work_from" />

                <flux:input type="time" label="{{ __('setting.default_working_hour_to') }}"
                    helper="{{ __('setting.default_working_hour_to_helper') }}" wire:model.defer="work_to" />
            </div>

            <div class="mt-4">
                <flux:textarea label="{{ __('setting.default_policy_text') }}"
                    placeholder="Add your default cancellation policy text here..."
                    helper="{{ __('setting.default_policy_text_helper') }}" wire:model.defer="cancel_policy" />
            </div>

            <div class="mt-6">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" wire:model.defer="allow_cancellation"
                        class="rounded border-gray-300 dark:border-zinc-700 text-blue-600 shadow-sm focus:ring focus:ring-blue-500">
                    <span class="text-sm text-gray-700 dark:text-gray-300">
                        {{ __('setting.default_allow_cancellation') }}
                    </span>
                </label>
            </div>

            <div class="mt-6">
                <flux:button type="submit">{{ __('setting.save') }}</flux:button>
            </div>
        </form>
    </x-settings.layout>
</section>
