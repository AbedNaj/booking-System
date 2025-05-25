<div>

    <div class="mb-6 p-4 rounded-lg bg-gray-800 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 shadow-sm">
        <p class="text-xl font-semibold text-white">
            @if (!empty($nextBooking['date']) && !empty($nextBooking['start_time']))
                {{ \Carbon\Carbon::parse($nextBooking['date'] . ' ' . $nextBooking['start_time'])->format('l, M d - h:i A') }}
            @else
                {{ __('No upcoming bookings') }}
            @endif
        </p>
    </div>

    <section class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">


        <x-app.dashbloard.card :title="__('dashboard.today_bookings')">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 dark:text-blue-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6l4 2m4-2a8 8 0 11-16 0 8 8 0 0116 0z" />
                </svg>
            </x-slot:icon>
            {{ $todayBookings }}
        </x-app.dashbloard.card>


        <x-app.dashbloard.card :title="__('employees.upcomingBookings')">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500 dark:text-yellow-400"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3M3 11h18M5 19h14a2 2 0 002-2V7H3v10a2 2 0 002 2zm7-7v3l2 1" />
                </svg>
            </x-slot:icon>
            {{ $FutureBookings }}
        </x-app.dashbloard.card>

        <x-app.dashbloard.card :title="__('employees.completedBookings')">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 dark:text-green-400"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </x-slot:icon>
            {{ $completedBookings }}
        </x-app.dashbloard.card>

        <x-app.dashbloard.card :title="__('employees.canceledBookings')">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 dark:text-red-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18.364 5.636l-12.728 12.728M5.636 5.636l12.728 12.728" />
                </svg>
            </x-slot:icon>
            {{ $canceledBookings }}
        </x-app.dashbloard.card>


    </section>
    @if ($bookingsNeedUpdate->isNotEmpty())


        <section>
            <div x-data="{ showTable: false }" class="mb-6 p-4 rounded-lg bg-zinc-800 border border-zinc-700 shadow-sm">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-yellow-400 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-yellow-300">
                                {{ __('employees.bookings_need_attention') }}
                            </p>
                            <p class="text-xs text-zinc-400">
                                {{ __('employees.bookings_instruction') }}
                            </p>
                        </div>
                    </div>
                    <button @click="showTable = !showTable"
                        class="text-xs px-3 py-1 hover:cursor-pointer bg-zinc-700 text-gray-200 rounded hover:bg-zinc-600 transition">
                        <span x-show="!showTable">{{ __('employees.view') }}</span>
                        <span x-cloak x-show="showTable">{{ __('employees.hide') }}</span>
                    </button>
                </div>

                <div x-show="showTable" x-cloak x-transition class="mt-4">
                    <table class="min-w-full text-sm">
                        <thead class="text-left text-gray-400 border-b border-zinc-700">
                            <tr>
                                <th class="px-4 py-2">{{ __('employees.customer') }}</th>
                                <th class="px-4 py-2">{{ __('employees.service') }}</th>
                                <th class="px-4 py-2">{{ __('employees.date') }}</th>
                                <th class="px-4 py-2">{{ __('employees.start_time') }}</th>
                                <th class="px-4 py-2">{{ __('employees.end_time') }}</th>
                                <th class="px-4 py-2">{{ __('employees.action') }}</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-200">
                            @foreach ($bookingsNeedUpdate as $booking)
                                <tr class="hover:bg-zinc-700/50 transition">
                                    <td class="px-4 py-2">{{ $booking->customer->name }}</td>
                                    <td class="px-4 py-2">{{ $booking->service->name }}</td>
                                    <td class="px-4 py-2">{{ $booking->date }}</td>
                                    <td class="px-4 py-2">{{ $booking->start_time }}</td>
                                    <td class="px-4 py-2">{{ $booking->end_time }}</td>
                                    <td class="px-4 py-2">
                                        <button wire:click="setCompleted('{{ $booking->id }}')"
                                            class="text-green-400 hover:cursor-pointer hover:underline text-xs">
                                            {{ __('employees.mark_completed') }}
                                        </button>
                                        <span class="mx-1 text-gray-500">/</span>
                                        <button wire:click="setNoShow('{{ $booking->id }}')"
                                            class="text-red-400 hover:cursor-pointer hover:underline text-xs">
                                            {{ __('employees.mark_no_show') }}
                                        </button>
                                        <span class="mx-1 text-gray-500">/</span>
                                        <a wire:navigate
                                            href="{{ route('app.employee.booking.details', $booking->id) }}"
                                            class="text-blue-400 hover:cursor-pointer hover:underline text-xs">
                                            {{ __('employees.details') }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    @endif
    <div
        class="bg-white dark:bg-zinc-800 rounded-2xl shadow-sm border border-gray-200 dark:border-zinc-700 overflow-hidden">
        <div class="p-6 pb-4">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-base font-medium text-gray-800 dark:text-gray-200">
                        {{ __('dashboard.upcoming_bookings') }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('dashboard.upcoming_description') }}
                    </p>
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


                            <td class="px-6 py-4">

                                <span class="text-gray-700 dark:text-gray-300">{{ $booking->customer->name }}</span>

                            </td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $booking->service->name }}
                            </td>
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

                                    <a href="{{ route('app.employee.booking.details', $booking->id) }}" wire:navigate
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



    </div>
</div>
