<div>
    <section class="mb-4 space-y-2">
        <h1 class="text-2xl dark:border-zinc-700">{{ __('booking.title') }}</h1>
        <flux:separator />
    </section>

    <section class="mb-6">
        <div class="flex flex-col sm:flex-row sm:flex-wrap sm:gap-4 space-y-4 sm:space-y-0">

      
    <x-app.search.select wireModel="selectedStatus" :datas="$statusOptions" >
              {{ __('booking.selectStatus') }}
    </x-app.search.select>
        <x-app.search.date-picker wireModel="dateFrom">{{ __('booking.dateFrom') }}</x-app.search.date-picker>

        <x-app.search.date-picker wireModel="dateTo">{{ __('booking.dateTo') }}</x-app.search.date-picker>

 

         <x-app.search.input placeholder="{{ __('booking.searchByServicePlaceholder') }}" wireModel="serviceSearch" >
                  {{ __('booking.searchByService') }}
         </x-app.search.input>

                <x-app.search.input placeholder="{{ __('booking.searchByEmployeePlaceholder') }}" wireModel="employeeSearch" >
                  {{ __('booking.searchByEmployee') }}
         </x-app.search.input>
                  <x-app.search.input placeholder="{{ __('booking.searchByCustomerPlaceholder') }}" wireModel="customerSearch" >
                  {{ __('booking.searchByCustomer') }}
         </x-app.search.input>
            
          

 

        </div>
    </section>

    <livewire:app.common.table :allowSearch="false" listener="bookingAdd" :with="['customer', 'service', 'employee']" model="\App\Models\Booking" :columns="[
        ['field' => 'date', 'label' => __('booking.date')],
        ['field' => 'service.name', 'label' => __('booking.service')],
        ['field' => 'employee.name', 'label' => __('booking.employee')],
        ['field' => 'customer.name', 'label' => __('booking.customer')],
        ['field' => 'date', 'label' => __('booking.date')],
        ['field' => 'status', 'label' => __('booking.status'), 'enum' => App\Enums\BookingStatusEnum::class],
    ]"
        orderBy="date" key="table-{{ $selectedStatus }}-{{ $dateFrom }}-{{ $dateTo }}-{{ $serviceSearch }}-{{ $employeeSearch }}-{{ $customerSearch }}"
 :filters="[
            ['field' => 'tenant_id', 'operator' => '=', 'value' => auth()->user()->tenant_id],
            ['field' => 'status', 'operator' => '=', 'value' => $selectedStatus],
            ['field' => 'date', 'operator' => '>=', 'value' => $dateFrom],
            ['field' => 'date', 'operator' => '<=', 'value' => $dateTo],
        ]" 
        
  :relationFilters="[
    'service' => ['field' => 'name', 'operator' => 'LIKE', 'value' => '%' . $serviceSearch . '%'],
    'employee' => ['field' => 'name', 'operator' => 'LIKE', 'value' => '%' . $employeeSearch . '%'],
    'customer' => ['field' => 'name', 'operator' => 'LIKE', 'value' => '%' . $customerSearch . '%'],
]"
        :title="__('booking.bookingList')"
        detailsRouteName="app.bookings.show" />
</div>
