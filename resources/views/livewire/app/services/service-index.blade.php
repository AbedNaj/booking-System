<div>
    <section class="mb-4 space-y-2 ">
        <h1 class="text-2xl dark:border-zinc-700">{{ __('services.title') }}</h1>
        <flux:separator />
    </section>




    <x-app.slide-over :slideTitle=" __('services.add')">
        <x-slot:trigger>
            <flux:button variant="primary" class="mb-2  hover:cursor-pointer">{{ __('services.add') }}</flux:button>
        </x-slot:trigger>
        <livewire:app.services.service-create>

    </x-app.slide-over>

    <livewire:app.common.table listener='serviceAdd' model="\App\Models\Service" :columns="[
        ['field' => 'name', 'label' => 'Service Name'],
        ['field' => 'description', 'label' => 'Description'],
        ['field' => 'price', 'label' => 'Price'],
        ['field' => 'max_bookings_per_day', 'label' => 'max bookings per day'],
        ['field' => 'status', 'label' => 'Status'],
    ]" :filters="[
        ['field' => 'tenant_id', 'operator' => '=', 'value' => auth()->user()->tenant_id]
    ]" title="قائمة الخدمات" detailsRouteName="app.services.show" />

</div>