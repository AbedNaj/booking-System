<div>
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
</div>
