<div>
    <div class="p-6 bg-white dark:bg-zinc-900 rounded-lg shadow">
        <h1 class="text-3xl font-extrabold mb-6 text-gray-800 dark:text-gray-100 border-b pb-2">
            {{ __('customers.customerDetails') }}
        </h1>

        @if (session()->has('success'))
            <x-app.alert message="{{ session('success') }}"></x-app.alert>
        @endif

        @if($editing)
            <div class="space-y-6">

                <x-app.form.input model="name">{{ __('customers.customerName') }}</x-app.form.input>

                <x-app.form.input model="email">{{ __('customers.customerEmail') }}</x-app.form.input>

                <x-app.form.input model="phone">{{ __('customers.customerPhone') }}</x-app.form.input>

                <x-app.form.input model="address">{{ __('customers.customerAddress') }}</x-app.form.input>

                <x-app.form.input model="totalBookings">{{ __('customers.totalBookings') }}</x-app.form.input>

                <x-app.form.input model="lastBookingDate">{{ __('customers.lastBookingDate') }}</x-app.form.input>


                <x-app.form.input model="notes">{{ __('customers.notes') }}</x-app.form.input>




                <div class="flex gap-2 mt-8">
                    <x-app.custome-buttons type="save"> {{ __('services.save') }}</x-app.custome-buttons>
                    <x-app.custome-buttons type="cancel"> {{ __('services.cancel') }}</x-app.custome-buttons>

                </div>
            </div>

        @else
            <div class="space-y-6">

                <x-app.label label="{{ __('customers.customerName') }}">{{ $customer->name }}</x-app.label>
                <x-app.label label="{{ __('customers.customerEmail') }}">{{ $customer->email }}</x-app.label>
                <x-app.label label="{{ __('customers.customerPhone') }}">{{ $customer->phone }}</x-app.label>
                <x-app.label label="{{ __('customers.customerAddress') }}">{{ $customer->address }}</x-app.label>
                <x-app.label label="{{ __('customers.totalBookings') }}">{{ $customer->total_bookings }}</x-app.label>
                <x-app.label label="{{ __('customers.lastBookingDate') }}">{{ $customer->last_booking_at }}</x-app.label>
                <x-app.label label="{{ __('customers.notes') }}">{{ $customer->notes }}</x-app.label>
                <div class="flex gap-2 mt-8">

                    <x-app.custome-buttons type="edit"> {{ __('services.edit') }}</x-app.custome-buttons>
                    <x-app.custome-buttons type="delete"> {{ __('services.delete') }}</x-app.custome-buttons>
                </div>
            </div>
        @endif
    </div>
</div>