<div>

    <section class="mb-8">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ __('dashboard.dashboard') }}</h1>
            <div class="flex space-x-3">

            </div>
        </div>
        <p class="text-gray-500 dark:text-gray-400 mt-1">{{ __('dashboard.welcome_message') }}</p>
        <flux:separator class="my-4" />
    </section>


    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">


        <x-app.dashbloard.card :title="__('dashboard.today_bookings')">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500 dark:text-yellow-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6l4 2m4-2a8 8 0 11-16 0 8 8 0 0116 0z" />
                </svg>
            </x-slot:icon>
            {{ $todayBookings }}
        </x-app.dashbloard.card>

        <x-app.dashbloard.card :title="__('dashboard.total_bookings')">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500 dark:text-indigo-400"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </x-slot:icon>
            {{ $totalBookings }}
        </x-app.dashbloard.card>


        <x-app.dashbloard.card :title="__('dashboard.confirmed_bookings')">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 dark:text-green-400"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </x-slot:icon>
            {{ $confirmedBookings }}
        </x-app.dashbloard.card>




        <x-app.dashbloard.card :title="__('dashboard.cancelled_bookings')">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 dark:text-red-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </x-slot:icon>
            {{ $cancelledBookings }}
        </x-app.dashbloard.card>




    </section>



    <section class="grid grid-cols-1 lg:grid-cols-1 gap-6 mb-8">

        <div
            class="col-span-2 bg-white dark:bg-zinc-800 rounded-2xl shadow-sm p-6 border border-gray-200 dark:border-zinc-700">
            <div class="bg-white dark:bg-zinc-800 p-4">
                <div class="flex justify-between">

                    <h2 class="text-lg font-bold mb-4 text-gray-900 dark:text-gray-100">
                        {{ __('dashboard.booking_chart') }}
                    </h2>

                </div>
                <div class="h-64">
                    <canvas id="bookingChart" class="w-full h-full"></canvas>

                    <script>
                        window.bookingChartLabels = @json($labels);
                        window.bookingChartData = @json($values);
                        window.bookingChartTitle = @json(__('dashboard.booking_chart'));
                    </script>
                </div>
            </div>
        </div>



    </section>

    <!-- Upcoming Bookings -->
    <section
        class="bg-white dark:bg-zinc-800 rounded-2xl shadow-sm border border-gray-200 dark:border-zinc-700 overflow-hidden">
        <div class="p-6 pb-4">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-base font-medium text-gray-800 dark:text-gray-200">
                        {{ __('dashboard.upcoming_bookings') }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('dashboard.upcoming_description') }}</p>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="relative">
                        <input type="text" placeholder="Search bookings..."
                            class="pl-9 pr-4 py-2 bg-gray-100 dark:bg-zinc-700 border-0 rounded-lg text-gray-600 dark:text-gray-300 text-sm w-64">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 absolute left-3 top-2.5"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <button
                        class="p-2 bg-gray-100 hover:bg-gray-200 dark:bg-zinc-700 dark:hover:bg-zinc-600 text-gray-500 dark:text-gray-400 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead
                    class="bg-gray-50 dark:bg-zinc-700/50 text-gray-600 dark:text-gray-300 border-y border-gray-200 dark:border-zinc-700">
                    <tr>
                        <th class="px-6 py-3 font-medium">{{ __('dashboard.employee') }}</th>
                        <th class="px-6 py-3 font-medium">{{ __('dashboard.customer') }}</th>
                        <th class="px-6 py-3 font-medium">{{ __('dashboard.service') }}</th>
                        <th class="px-6 py-3 font-medium">{{ __('dashboard.date') }}</th>
                        <th class="px-6 py-3 font-medium">{{ __('dashboard.time') }}</th>
                        <th class="px-6 py-3 font-medium">{{ __('dashboard.status') }}</th>
                        <th class="px-6 py-3 font-medium">{{ __('dashboard.actions') }}</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 dark:divide-zinc-700">
                    @foreach ($bookings as $booking)
                        <tr class="hover:bg-gray-50 dark:hover:bg-zinc-700/30">

                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $booking->employee->name }}</td>
                            <td class="px-6 py-4">

                                <span class="text-gray-700 dark:text-gray-300">{{ $booking->customer->name }}</span>

                            </td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $booking->service->name }}</td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $booking->date }}</td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $booking->start_time }}</td>
                            @php
                                $enum = \App\Enums\BookingStatusEnum::tryFrom($booking->status);
                                $color = $enum?->color() ?? 'gray';
                            @endphp

                            <td class="px-3 py-2">
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded text-xs font-semibold text-{{ $color }}-800 bg-{{ $color }}-100 dark:bg-{{ $color }}-100">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex space-x-2">

                                    <a href="{{ route('app.bookings.show', $booking->id) }}" wire:navigate
                                        class="px-3 py-1 text-xs font-semibold text-white bg-blue-500 rounded hover:bg-blue-600 hover:cursor-pointer shadow-sm transition-all duration-300">
                                        {{ __('Details') }}
                                    </a>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-2 px-4 py-2">{{ $bookings->links() }}</div>
        </div>



    </section>
</div>
