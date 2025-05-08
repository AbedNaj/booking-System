<div>
    <section class="mb-4 space-y-2 ">
        <h1 class="text-2xl dark:border-zinc-700">{{ __('booking.title') }}</h1>
        <flux:separator />
    </section>


    <livewire:app.common.table listener='bookingAdd' :with="['customer', 'service', 'employee']" model="\App\Models\Booking" :columns="[
        ['field' => 'date', 'label' => __('booking.date')],
        ['field' => 'service.name', 'label' => __('booking.service')],
        ['field' => 'employee.name', 'label' => __('booking.employee')],
        ['field' => 'customer.name', 'label' => __('booking.customer')],
        ['field' => 'date', 'label' => __('booking.date')],
        ['field' => 'status', 'label' => __('booking.status')],
    ]"
        orderBy="date" :filters="[['field' => 'tenant_id', 'operator' => '=', 'value' => auth()->user()->tenant_id]]" :title="__('booking.bookingList')" detailsRouteName="app.bookings.show" />
</div>
