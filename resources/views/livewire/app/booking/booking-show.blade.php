<div>
    <div>
        <div class="p-6  min-h-screen">
            <div class="max-w-3xl mx-auto bg-white dark:bg-zinc-900 rounded-lg shadow p-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">{{ __('booking.details_title') }}</h1>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('booking.service') }}</p>
                        <p class="text-base font-semibold text-gray-800 dark:text-white">{{ $booking->service->name }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('booking.date_time') }}</p>
                        <p class="text-base font-semibold text-gray-800 dark:text-white">{{ $booking->start_time }} –
                            {{ $booking->end_time }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('booking.duration') }}</p>
                        <p class="text-base font-semibold text-gray-800 dark:text-white">{{ $booking->duration }}
                            {{ __('booking.minutes') }}</p>
                    </div>

                    <div>
       

                                   <x-status-badge :enumClass="App\Enums\BookingStatusEnum::class" :value="$booking->status">{{ __('booking.status') }}</x-status-badge>
                    </div>

                    @if ($booking->employee)
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('booking.employee') }}</p>
                            <p class="text-base font-semibold text-gray-800 dark:text-white">
                                {{ $booking->employee->name }}</p>
                        </div>
                    @endif

                    @if ($booking->payment)
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('booking.payment_status') }}</p>
                            <p class="text-base font-semibold text-gray-800 dark:text-white">
                                {{ $booking->payment->status }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('booking.payment_method') }}</p>
                            <p class="text-base font-semibold text-gray-800 dark:text-white">
                                {{ $booking->payment->method }}</p>
                        </div>
                    @endif

                    @if ($booking->status === 'cancelled' && $booking->cancellation_reason)
                        <div class="sm:col-span-2">
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('booking.cancellation_reason') }}
                            </p>
                            <p class="text-base text-red-700 dark:text-red-400">{{ $booking->cancellation_reason }}</p>
                        </div>
                    @endif

                    @if ($isCanncellationAllowed == true)
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ __('booking.cancellation_deadline') }}</p>
                            <p class="text-base font-semibold text-gray-800 dark:text-white">
                                {{ $cancellationDeadline }}</p>
                        </div>
                    @endif
                </div>

                <hr class="my-6 border-gray-200 dark:border-zinc-700" />

                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">{{ __('booking.customer_info') }}</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('booking.customer_name') }}</p>
                        <p class="text-base font-semibold text-gray-800 dark:text-white">{{ $booking->customer->name }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('booking.customer_phone') }}</p>
                        <p class="text-base font-semibold text-gray-800 dark:text-white">
                            {{ $booking->customer->phone }}</p>
                    </div>

                    <div class="sm:col-span-2">
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('booking.customer_notes') }}</p>
                        <p class="text-base text-gray-700 dark:text-gray-300">{{ $booking->customer->notes }}</p>
                    </div>
                </div>

                <div x-data="{ deleteConfirm : false }" class="mt-8 flex space-x-2 justify-end">

                    <button onclick="history.back()"
                        class="px-4 py-2 text-sm font-medium hover:cursor-pointer bg-gray-200 dark:bg-zinc-700 dark:text-white rounded-lg hover:bg-gray-300 dark:hover:bg-zinc-600 transition">
                        {{ __('booking.back') }}
                    </button>

                    @if ($isCanncellationAllowed == true)
                        <button @click="deleteConfirm = true"
                            class="px-4 py-2 text-sm font-medium hover:cursor-pointer bg-red-500 text-white rounded-lg hover:bg-red-600 transition">{{ __('booking.cancel_booking') }}
                        </button>

                        <x-app.delete-confirm click="cancelBooking" :confirmButton="__('booking.confirm')">{{ __('booking.confirm_cancel') }}</x-app.delete-confirm>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
