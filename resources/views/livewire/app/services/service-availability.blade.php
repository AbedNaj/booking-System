<div>
    <div>
        <div class="p-6 bg-white dark:bg-zinc-900 rounded-lg shadow-md">
            <h1 class="text-3xl font-extrabold mb-6 text-gray-800 dark:text-gray-100 border-b pb-2">
                {{ __('services.serviceAvailability') }}
            </h1>

            @if (session()->has('success'))
                <x-app.alert message="{{ session('success') }}"></x-app.alert>
            @endif

            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-200 mb-2">{{ $service->name }}</h2>
                <p class="text-gray-600 dark:text-gray-400">

                    {{ __('services.serviceAvailabilityDescription') }}
                </p>
            </div>


            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-zinc-800">
                            <th class="py-3 px-4 text-left text-gray-600 dark:text-gray-300 font-medium">
                                {{ __('services.dayOfWeek') }}
                            </th>
                            <th class="py-3 px-4 text-left text-gray-600 dark:text-gray-300 font-medium">
                                {{ __('services.availability') }}
                            </th>
                            <th class="py-3 px-4 text-left text-gray-600 dark:text-gray-300 font-medium">
                                {{ __('services.startTime') }}
                            </th>
                            <th class="py-3 px-4 text-left text-gray-600 dark:text-gray-300 font-medium">
                                {{ __('services.endTime') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($availabilities as $availability)
                            <tr
                                class="border-b border-gray-200 dark:border-zinc-700 hover:bg-gray-50 dark:hover:bg-zinc-800">
                                <td class="py-4 px-4 text-gray-800 dark:text-gray-200">
                                    {{ $availability->day_name }}
                                </td>

                                <td class="py-4 px-4">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" wire:model="Availability.{{ $availability->id }}"
                                            @checked($availability->is_available)
                                            class="form-checkbox h-5 w-5 text-blue-600 rounded border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 dark:bg-zinc-700 dark:border-zinc-600">
                                    </label>
                                </td>

                                <td class="py-4 px-4">
                                    <input type="time" wire:model="startTime.{{ $availability->id }}"
                                        class="form-input block w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white">
                                </td>

                                <td class="py-4 px-4">
                                    <input type="time" wire:model="endTime.{{ $availability->id }}"
                                        class="form-input block w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white">
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>

            <div class="mt-8 flex flex-wrap gap-3">
                <button wire:click='save' type="submit" id="saveAvailabilities"
                    class="px-5 hover:cursor-pointer py-2 bg-green-600 text-white rounded hover:bg-green-700 transition-colors focus:outline-none focus:ring focus:ring-green-200 text-lg">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        {{ __('services.save') }}
                    </span>
                </button>


                <button type="button" wire:click='setAllAvailable' id="setAllAvailable"
                    class="px-5 py-2 hover:cursor-pointer  bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors focus:outline-none focus:ring focus:ring-blue-200 text-lg">
                    {{ __('services.makeAllDaysAvailable') }}
                </button>

                <button type="button" wire:click='setAllUnavailable' id="setAllUnavailable"
                    class="px-5 py-2 hover:cursor-pointer  bg-red-500 text-white rounded hover:bg-red-600 transition-colors focus:outline-none focus:ring focus:ring-red-200 text-lg">
                    {{ __('services.makeAllDaysUnavailable') }}
                </button>
            </div>


        </div>
    </div>
</div>