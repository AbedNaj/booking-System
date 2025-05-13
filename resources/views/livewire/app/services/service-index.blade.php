<div>


    <x-app.page-heading>{{ __('services.title') }}</x-app.page-heading>


    <section class="flex justify-between">


        <x-app.slide-over :slideTitle="__('services.add')">
            <x-slot:trigger>
                <flux:button class="mb-2  hover:cursor-pointer">{{ __('services.add') }}</flux:button>
            </x-slot:trigger>
            <livewire:app.services.service-create>
        </x-app.slide-over>


    </section>



    <livewire:app.common.table listener='serviceAdd' model="\App\Models\Service" :columns="[
        ['field' => 'name', 'label' => __('services.serviceName')],
        ['field' => 'description', 'label' => __('services.serviceDescription')],
        ['field' => 'price', 'label' => __('services.price')],
        ['field' => 'status', 'label' => __('services.status'), 'enum' => \App\Enums\ServiceStatus::class],
    ]" :filters="[
        ['field' => 'tenant_id', 'operator' => '=', 'value' => auth()->user()->tenant_id],
      
    ]"
        :title="__('services.titleList')" detailsRouteName="app.services.show" />

</div>
