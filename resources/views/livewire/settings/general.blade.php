<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('setting.pageTitle')" :subheading="__('setting.pageDescription')">

        <div class="mb-6 space-y-2">
            <h3 class="text-l font-semibold text-gray-900 dark:text-white">
                {{ __('setting.general') }}
            </h3>
            <p class="text-sm text-gray-600 dark:text-gray-300">
                {{ __('setting.pageDescription') }}
            </p>
        </div>

        <form wire:submit.prevent='saveGeneral'>
            <section class="flex flex-col">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <flux:input label="{{ __('setting.site_name') }}" placeholder="BookingPro"
                        helper="{{ __('setting.site_name_helper') }}" wire:model.defer="site_name" />

                    <flux:input label="{{ __('setting.site_email') }}" placeholder="info@bookingpro.com"
                        helper="{{ __('setting.site_email_helper') }}" wire:model.defer="site_email" />

                    <flux:input label="{{ __('setting.site_phone') }}" placeholder="+1234567890"
                        helper="{{ __('setting.site_phone_helper') }}" wire:model.defer="site_phone" />

                    <flux:input label="{{ __('setting.site_address') }}" placeholder="123 Main Street, City"
                        helper="{{ __('setting.site_address_helper') }}" wire:model.defer="site_address" />


                </div>
                <div class="mt-2">
                    <flux:button type="submit" class="hover:cursor-pointer">{{ __('setting.save') }}</flux:button>
                </div>
            </section>

        </form>

        <form enctype="multipart/form-data" wire:submit.prevent='saveLogo'>
            <div class="mt-8 space-y-2">

                <h3 class="text-l font-semibold text-gray-900 dark:text-white">
                    {{ __('setting.site_logo') }}
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    {{ __('setting.site_logo_helper') }}
                </p>

                <div class="flex items-center space-x-4 mt-4">
                    @if (!empty($currentLogo))
                        <img src="{{ $currentLogo }}" class="w-16 h-16 object-cover rounded">
                    @endif

                    <flux:input type="file" wire:model="logo" label="{{ __('setting.site_logo') }}" />
                </div>

                <div>
                    <flux:button type="submit" class="hover:cursor-pointer">{{ __('setting.save') }}</flux:button>
                </div>
            </div>

        </form>

        <form wire:submit.prevent='headingSave'>
            <div class="mt-10 space-y-2">
                <h3 class="text-l font-semibold text-gray-900 dark:text-white">
                    {{ __('setting.generalHeading') }}
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    {{ __('setting.generalHeading_helper') }}
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <flux:input label="{{ __('setting.generalHeading') }}" placeholder="Welcome to BookingPro"
                        helper="{{ __('setting.generalHeading_helper') }}" wire:model.defer="heading" />

                    <flux:input label="{{ __('setting.generalSubHeading') }}"
                        placeholder="Fast, easy, and reliable appointments."
                        helper="{{ __('setting.generalSubHeading_helper') }}" wire:model.defer="subheading" />
                </div>

                <div class="mt-4">
                    <flux:textarea label="{{ __('setting.projectDescription') }}"
                        placeholder="Describe your business, its values, or how it helps customers..."
                        helper="{{ __('setting.projectDescription_helper') }}" wire:model.defer="project_desc" />
                </div>
                <div>
                    <flux:button type="submit" class="hover:cursor-pointer">{{ __('setting.save') }}</flux:button>
                </div>
            </div>


        </form>
    </x-settings.layout>
</section>
