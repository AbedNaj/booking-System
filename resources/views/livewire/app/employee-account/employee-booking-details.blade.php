<div>
    <div class="p-6 bg-gray-50 dark:bg-zinc-900 min-h-screen">
        <div
            class="max-w-3xl mx-auto bg-white dark:bg-zinc-800 rounded-xl shadow border border-gray-200 dark:border-zinc-700 p-6">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Booking Details</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Service</p>
                    <p class="text-base font-semibold text-gray-800 dark:text-white">{{ $booking->service->name }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Date & Time</p>
                    <p class="text-base font-semibold text-gray-800 dark:text-white"> {{ $booking->start_time }} –
                        {{ $booking->end_time }}
                    </p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Duration</p>
                    <p class="text-base font-semibold text-gray-800 dark:text-white">{{ $booking->duration }} minutes
                    </p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Status</p>
                    <span
                        class="inline-flex items-center px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-lg">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600 mr-1.5"></span>
                        {{ $booking->status }} </span>
                    </span>
                </div>
    @if ($booking->service->allow_cancellation)
          <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Cancellation Dead Line</p>
                    <p class="text-base font-semibold text-gray-800 dark:text-white">{{ $cancellationDeadline }} 
                    </p>
                </div>
    @endif
                    
            </div>

            <hr class="my-6 border-gray-200 dark:border-zinc-700" />

            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Customer Info</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Name</p>
                    <p class="text-base font-semibold text-gray-800 dark:text-white">{{ $booking->customer->name }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Phone</p>
                    <p class="text-base font-semibold text-gray-800 dark:text-white">{{ $booking->customer->phone }}</p>
                </div>
                <div class="sm:col-span-2">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Notes</p>
                    <p class="text-base text-gray-700 dark:text-gray-300">{{ $booking->customer->notes }}</p>
                </div>
            </div>

            <div class="mt-8 flex justify-end gap-3">
                <button onclick="history.back()"
                    class="px-4 py-2 text-sm font-medium hover:cursor-pointer bg-gray-200 dark:bg-zinc-700 dark:text-white rounded-lg hover:bg-gray-300 dark:hover:bg-zinc-600 transition">Back</button>
    @if ($isCanncellationAllowed == true)
                <button
                wire:click="cancelBooking"
                    class="px-4 py-2 text-sm font-medium hover:cursor-pointer bg-red-500 text-white rounded-lg hover:bg-red-600 transition">Cancel
                    Booking</button>
    @endif
        
            </div>
        </div>
    </div>

</div>