<div>
    <div class="p-6 bg-white dark:bg-zinc-900 rounded-lg shadow-md">
        <h1
            class="text-3xl font-extrabold mb-6 text-gray-800 dark:text-gray-100 border-b pb-2 flex items-center justify-between">
            <div class="flex items-center">
                <span class="mr-2">{{ __('services.serviceDetails') }}</span>
                <span
                    class="ml-3 text-sm bg-gray-100 dark:bg-zinc-800 text-gray-700 dark:text-gray-300 px-3 py-1 rounded-full font-normal">
                    {{ $service->status == 'active' ? __('services.active') : __('services.inactive') }}
                </span>
            </div>
            <a wire:navigate href="{{ route('app.services.availability', ['service' => $service->id]) }}"
                class="px-5 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition-colors focus:outline-none focus:ring focus:ring-indigo-200 text-lg">
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 10l4.553-2.276a1 1 0 00-.106-1.818l-14-5A1 1 0 004 2v16a1 1 0 001.447.894L15 14v-4z" />
                    </svg>
                    {{ __('services.serviceAvailability') }}
                </span>
            </a>
        </h1>
        @if (session()->has('success'))
            <x-app.alert message="{{ session('success') }}"></x-app.alert>
        @endif
        @if($editing)
            <form wire:submit.prevent="save" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <x-app.form.input model='form.name'> {{ __('services.serviceName') }}</x-app.form.input>
                    <x-app.form.input model='form.category_id'> {{ __('services.category') }}</x-app.form.input>
                </div>
                <x-app.form.text-area model='form.description'> {{ __('services.description') }}</x-app.form.text-area>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <x-app.form.input model='form.price' type="number" step="0.01">
                        {{ __('services.price') }}</x-app.form.input>
                    <x-app.form.input model='form.duration_minutes' type="number">
                        {{ __('services.duration') }} (minutes)</x-app.form.input>
                    <x-app.form.input model='form.max_bookings_per_day' type="number">
                        {{ __('services.maxBookingsPerDay') }}</x-app.form.input>
                </div>

                <div class="p-4 bg-gray-50 dark:bg-zinc-800 rounded-lg">
                    <h3 class="font-semibold text-lg mb-4 text-gray-800 dark:text-gray-100">
                        {{ __('services.cancellationSettings') }}
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="allow_cancellation"
                                class="block mb-1 text-gray-500 text-sm font-medium uppercase tracking-wider">
                                {{ __('services.allowCancellation') }}
                            </label>
                            <select id="allow_cancellation" wire:model.defer="form.allow_cancellation"
                                class="w-full p-2 rounded-lg bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 text-sm text-gray-800 dark:text-white focus:ring focus:ring-blue-500 focus:outline-none">
                                <option value="1">{{ __('services.yes') }}</option>
                                <option value="0">{{ __('services.no') }}</option>
                            </select>
                            @error('form.allow_cancellation')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <x-app.form.input model='form.cancellation_hours_before' type="number">
                            {{ __('services.cancellationHoursBefore') }}</x-app.form.input>
                        <x-app.form.input model='form.cancellation_fee' type="number" step="0.01">
                            {{ __('services.cancellationFee') }}</x-app.form.input>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="image" class="block mb-1 text-gray-500 text-sm font-medium uppercase tracking-wider">
                            {{ __('services.image') }}
                        </label>
                        <div class="flex items-center space-x-4">
                            @if($service->image)
                                <img src="{{ Storage::disk('do')->url($service->image) }}"
                                    class="w-16 h-16 object-cover rounded">
                            @endif
                            <input id="image" type="file" wire:model="image"
                                class="flex-1 w-full p-2 rounded-lg bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 text-sm text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:ring focus:ring-blue-500 focus:outline-none">
                        </div>
                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="status" class="block mb-1 text-gray-500 text-sm font-medium uppercase tracking-wider">
                            {{ __('services.status') }}
                        </label>
                        <select id="status" wire:model.defer="form.status"
                            class="w-full p-2 rounded-lg bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 text-sm text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:ring focus:ring-blue-500 focus:outline-none">
                            <option value="active">{{ __('services.active') }}</option>
                            <option value="inactive">{{ __('services.inactive') }}</option>
                        </select>
                        @error('form.status')
                            <span class="text-red-500 text-sm"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <div class="flex gap-3 mt-8">
                    <button type="submit"
                        class="px-5 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition-colors focus:outline-none focus:ring focus:ring-green-200 text-lg">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            {{ __('services.save') }}
                        </span>
                    </button>
                    <button type="button" wire:click="$set('editing', false)"
                        class="px-5 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition-colors focus:outline-none focus:ring focus:ring-gray-200 text-lg">
                        {{ __('services.cancel') }}
                    </button>
                </div>
            </form>
        @else
            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">
                            {{ __('services.serviceName') }}
                        </label>
                        <p class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $service->name }}</p>
                    </div>
                    <div>
                        <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">
                            {{ __('services.category') }}
                        </label>
                        <p class="text-lg text-gray-800 dark:text-gray-100">
                            <span
                                class="px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-100 rounded-full">
                                {{ $service->category->name ?? __('form.noCategory') }}
                            </span>
                        </p>
                    </div>
                </div>
                <div>
                    <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">
                        {{ __('services.description') }}
                    </label>
                    <div class="p-4 bg-gray-50 dark:bg-zinc-800 rounded-lg">
                        <p class="text-gray-700 dark:text-gray-200 leading-relaxed">{{ $service->description }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">
                            {{ __('services.price') }}
                        </label>
                        <p class="text-lg font-bold text-green-600 dark:text-green-400">${{ $service->price }}</p>
                    </div>
                    <div>
                        <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">
                            {{ __('services.duration') }}
                        </label>
                        <p class="text-gray-800 dark:text-gray-100">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-1 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $service->duration_minutes }} {{ __('services.minutes') }}
                            </span>
                        </p>
                    </div>
                    <div>
                        <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">
                            {{ __('services.maxBookingsPerDay') }}
                        </label>
                        <p class="text-gray-800 dark:text-gray-100">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-1 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                {{ $service->max_bookings_per_day ?? __('services.nomaxbooking') }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="p-4 bg-gray-50 dark:bg-zinc-800 rounded-lg">
                    <h3 class="font-semibold text-lg mb-4 text-gray-800 dark:text-gray-100">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                </path>
                            </svg>
                            {{ __('services.cancellationSettings') }}
                        </span>
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">
                                {{ __('services.allowCancellation') }}
                            </label>
                            <p class="text-gray-800 dark:text-gray-100">
                                @if($service->allow_cancellation)
                                    <span class="flex items-center text-green-600">
                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        {{ __('services.yes') }}
                                    </span>
                                @else
                                    <span class="flex items-center text-red-600">
                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        {{ __('services.no') }}
                                    </span>
                                @endif
                            </p>
                        </div>
                        @if($service->allow_cancellation)
                            <div>
                                <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">
                                    {{ __('services.cancellationHoursBefore') }}
                                </label>
                                <p class="text-gray-800 dark:text-gray-100">
                                    <span class="flex items-center">
                                        <svg class="w-5 h-5 mr-1 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $service->cancellation_hours_before ?? __('services.noTimeLimit') }}
                                        @if($service->cancellation_hours_before)
                                            {{ __('services.hours') }}
                                        @endif
                                    </span>
                                </p>
                            </div>
                            <div>
                                <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">
                                    {{ __('services.cancellationFee') }}
                                </label>
                                <p class="text-gray-800 dark:text-gray-100">
                                    <span class="flex items-center">
                                        <svg class="w-5 h-5 mr-1 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                        @if($service->cancellation_fee)
                                            ${{ $service->cancellation_fee }}
                                        @else
                                            {{ __('services.noFee') }}
                                        @endif
                                    </span>
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

                <div>
                    <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">
                        {{ __('services.image') }}
                    </label>
                    @if($service->image)
                        <div class="mt-2">
                            <img src="{{ Storage::disk('do')->url($service->image) }}"
                                class="w-64 h-48 object-cover rounded-lg shadow">
                        </div>
                    @else
                        <p class="text-gray-500 italic">{{ __('services.noImage') }}</p>
                    @endif
                </div>
                <div class="flex gap-3 mt-8">
                    <button wire:click="enableEdit"
                        class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors focus:outline-none focus:ring focus:ring-blue-200 text-lg">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            {{ __('services.edit') }}
                        </span>
                    </button>
                    <button wire:click="delete" onclick="return confirm('{{ __('form.deleteMessage') }}')"
                        class="px-5 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors focus:outline-none focus:ring focus:ring-red-200 text-lg">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                            {{ __('services.delete') }}
                        </span>
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>