<div>

    <section class="mb-8">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ __('dashboard.dashboard') }}</h1>
            <div class="flex space-x-3">
                <button
                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    {{ __('dashboard.new_booking') }}
                </button>
                <button
                    class="px-4 py-2 bg-gray-100 hover:bg-gray-200 dark:bg-zinc-700 dark:hover:bg-zinc-600 text-gray-700 dark:text-gray-200 rounded-lg text-sm font-medium">
                    {{ __('dashboard.view_all') }}
                </button>
            </div>
        </div>
        <p class="text-gray-500 dark:text-gray-400 mt-1">{{ __('dashboard.welcome_message') }}</p>
        <flux:separator class="my-4" />
    </section>


    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        @foreach ($kbis as $kbi)
            <x-app.dashbloard.card>
                <x-slot:icon>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500 dark:text-indigo-400"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </x-slot:icon>
            </x-app.dashbloard.card>
        @endforeach





    </section>

    <!-- Charts + Top Services -->
    <section class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Chart Area -->
        <div
            class="col-span-2 bg-white dark:bg-zinc-800 rounded-2xl shadow-sm p-6 border border-gray-200 dark:border-zinc-700">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-base font-medium text-gray-800 dark:text-gray-200">
                        {{ __('dashboard.booking_chart') }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('dashboard.booking_trend') }}</p>
                </div>
                <div class="flex space-x-2">
                    <select
                        class="bg-gray-100 dark:bg-zinc-700 border-0 rounded-lg text-gray-600 dark:text-gray-300 text-sm py-1 px-3">
                        <option>Last 7 days</option>
                        <option>Last 30 days</option>
                        <option>Last 90 days</option>
                    </select>
                </div>
            </div>
            <div class="h-64 bg-gray-50 dark:bg-zinc-900 rounded-lg p-4 flex items-center justify-center">
                <!-- Placeholder for chart -->
                <div class="relative w-full h-full">
                    <div class="absolute bottom-0 left-0 right-0 flex justify-between h-40">
                        <div class="w-full">
                            <div class="relative h-full">
                                <div class="absolute bottom-0 w-full flex items-end space-x-6 px-2">
                                    @foreach (range(1, 7) as $day)
                                        @php $height = rand(20, 100); @endphp
                                        <div class="flex flex-col items-center flex-1">
                                            <div class="w-full bg-indigo-500 dark:bg-indigo-600 rounded-t-md"
                                                style="height: {{ $height }}%"></div>
                                            <span
                                                class="text-xs text-gray-500 dark:text-gray-400 mt-2">{{ date('D', strtotime("-$day days")) }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Y-axis labels -->
                    <div
                        class="absolute left-0 top-0 bottom-0 flex flex-col justify-between text-xs text-gray-400 py-2">
                        <span>100</span>
                        <span>75</span>
                        <span>50</span>
                        <span>25</span>
                        <span>0</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Services -->
        <div class="bg-white dark:bg-zinc-800 rounded-2xl shadow-sm p-6 border border-gray-200 dark:border-zinc-700">
            <div class="flex items-center justify-between mb-4">
                <p class="text-base font-medium text-gray-800 dark:text-gray-200">{{ __('dashboard.top_services') }}
                </p>
                <button
                    class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">{{ __('dashboard.view_all') }}</button>
            </div>
            <ul class="space-y-4">
                @foreach (range(1, 5) as $i)
                    @php
                        $percentage = rand(50, 95);
                        $services = [
                            'Haircut & Styling',
                            'Spa Treatment',
                            'Nail Service',
                            'Massage Therapy',
                            'Facial Treatment',
                        ];
                        $colors = ['bg-indigo-500', 'bg-emerald-500', 'bg-amber-500', 'bg-rose-500', 'bg-blue-500'];
                    @endphp
                    <li>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="font-medium text-gray-700 dark:text-gray-300">{{ $services[$i - 1] }}</span>
                            <span class="text-gray-500 dark:text-gray-400">{{ $percentage }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-zinc-700 rounded-full h-2">
                            <div class="{{ $colors[$i - 1] }} h-2 rounded-full" style="width: {{ $percentage }}%">
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
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
                        <th class="px-6 py-3 font-medium">{{ __('dashboard.booking_id') }}</th>
                        <th class="px-6 py-3 font-medium">{{ __('dashboard.customer') }}</th>
                        <th class="px-6 py-3 font-medium">{{ __('dashboard.service') }}</th>
                        <th class="px-6 py-3 font-medium">{{ __('dashboard.date') }}</th>
                        <th class="px-6 py-3 font-medium">{{ __('dashboard.time') }}</th>
                        <th class="px-6 py-3 font-medium">{{ __('dashboard.status') }}</th>
                        <th class="px-6 py-3 font-medium">{{ __('dashboard.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-zinc-700">
                    @php
                        $customers = ['John Smith', 'Emma Johnson', 'Michael Brown', 'Sarah Davis', 'Robert Wilson'];
                        $services = [
                            'Haircut & Styling',
                            'Spa Treatment',
                            'Nail Service',
                            'Massage Therapy',
                            'Facial Treatment',
                        ];
                        $statuses = [
                            [
                                'label' => 'Confirmed',
                                'class' =>
                                    'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400',
                            ],
                            [
                                'label' => 'Pending',
                                'class' => 'bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400',
                            ],
                            [
                                'label' => 'Cancelled',
                                'class' => 'bg-rose-100 text-rose-800 dark:bg-rose-900/30 dark:text-rose-400',
                            ],
                        ];
                    @endphp

                    @foreach (range(1, 5) as $i)
                        @php
                            $status = $statuses[array_rand($statuses)];
                            $date = date('M d, Y', strtotime("+$i days"));
                            $times = ['10:00 AM', '11:30 AM', '1:15 PM', '3:00 PM', '4:45 PM'];
                        @endphp
                        <tr class="hover:bg-gray-50 dark:hover:bg-zinc-700/30">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">#BK-{{ 1000 + $i }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div
                                        class="h-8 w-8 rounded-full bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 flex items-center justify-center mr-3 font-medium">
                                        {{ substr($customers[$i - 1], 0, 1) }}
                                    </div>
                                    <span class="text-gray-700 dark:text-gray-300">{{ $customers[$i - 1] }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $services[$i - 1] }}</td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $date }}</td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $times[$i - 1] }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $status['class'] }}">
                                    {{ $status['label'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <button
                                        class="p-1 text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                    <button
                                        class="p-1 text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button
                                        class="p-1 text-gray-500 hover:text-rose-600 dark:text-gray-400 dark:hover:text-rose-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-gray-200 dark:border-zinc-700">
            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-500 dark:text-gray-400">Showing 1 to 5 of 25 entries</p>
                <div class="flex space-x-1">
                    <button
                        class="px-3 py-1 bg-gray-100 dark:bg-zinc-700 text-gray-600 dark:text-gray-300 rounded text-sm disabled:opacity-50">Previous</button>
                    <button class="px-3 py-1 bg-indigo-600 text-white rounded text-sm">1</button>
                    <button
                        class="px-3 py-1 bg-gray-100 dark:bg-zinc-700 text-gray-600 dark:text-gray-300 rounded text-sm">2</button>
                    <button
                        class="px-3 py-1 bg-gray-100 dark:bg-zinc-700 text-gray-600 dark:text-gray-300 rounded text-sm">3</button>
                    <button
                        class="px-3 py-1 bg-gray-100 dark:bg-zinc-700 text-gray-600 dark:text-gray-300 rounded text-sm">Next</button>
                </div>
            </div>
        </div>
    </section>
</div>
