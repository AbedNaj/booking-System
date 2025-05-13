<div>
    <section class="mb-4 space-y-2 ">
        <h1 class="text-2xl dark:border-zinc-700">{{ __('customers.title') }}</h1>
        <flux:separator />
    </section>


    <x-app.slide-over :slideTitle="__('customers.add')">
        <x-slot:trigger>
            <flux:button class="mb-2 hover:cursor-pointer">{{ __('customers.add') }}</flux:button>
        </x-slot:trigger>

        @livewire('app.customers.customer-create')

    </x-app.slide-over>


    <section class="flex space-x-2 mb-4">
        <x-app.search.select wireModel="status" :datas="$statusOptions">{{ __('customers.status') }}</x-app.search.select>

    </section>

    <livewire:app.common.table listener='customerAdd' model="\App\Models\customer" :columns="[
        ['field' => 'name', 'label' => __('customers.customerName')],
        ['field' => 'email', 'label' => __('customers.customerEmail')],
        ['field' => 'phone', 'label' => __('customers.customerPhone')],
        ['field' => 'total_bookings', 'label' => __('customers.totalBookings')],
        ['field' => 'last_booking_at', 'label' => __('customers.lastBookingDate')],
        ['field' => 'status', 'label' => __('customers.status'), 'enum' => App\Enums\CustomerStatus::class],
    ]" :filters="[
        ['field' => 'tenant_id', 'operator' => '=', 'value' => auth()->user()->tenant_id],
        ['field' => 'status', 'operator' => '=', 'value' => $status],
    ]"
        key="table - {{ $status }}" :title="__('customers.list')" detailsRouteName="app.customers.show" />
</div>
