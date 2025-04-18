<div>
    <div class="p-6 bg-white dark:bg-zinc-900 rounded-lg shadow-md">
        <h1 class="text-3xl font-extrabold mb-6 text-gray-800 dark:text-gray-100 border-b pb-2 flex items-center">
            <span class="mr-2">{{ __('services.serviceDetails') }}</span>
            <span
                class="ml-auto text-sm bg-gray-100 dark:bg-zinc-800 text-gray-700 dark:text-gray-300 px-3 py-1 rounded-full font-normal">
                {{ $service->status == 'active' ? __('services.active') : __('services.inactive') }}
            </span>
        </h1>

        @if (session()->has('success'))
            <x-app.alert message="{{ session('success') }}"></x-app.alert>
        @endif

        @if($editing)
            <form wire:submit.prevent="save" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block mb-1 text-gray-500 text-sm font-medium uppercase tracking-wider">
                            {{ __('services.serviceName') }}
                        </label>
                        <input id="name" wire:model.defer="form.name" type="text"
                            class="w-full p-2 border rounded focus:ring focus:ring-blue-200 dark:bg-zinc-800 dark:text-white">
                        @error('form.name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="category" class="block mb-1 text-gray-500 text-sm font-medium uppercase tracking-wider">
                            {{ __('services.category') }}
                        </label>
                        <select id="category" wire:model.defer="form.category_id"
                            class="w-full p-2 border rounded focus:ring focus:ring-blue-200 dark:bg-zinc-800 dark:text-white">
                            <option value="">{{ __('services.selectCategory') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('form.category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label for="description" class="block mb-1 text-gray-500 text-sm font-medium uppercase tracking-wider">
                        {{ __('services.description') }}
                    </label>
                    <textarea id="description" wire:model.defer="form.description" rows="4"
                        class="w-full p-2 border rounded focus:ring focus:ring-blue-200 dark:bg-zinc-800 dark:text-white"></textarea>
                    @error('form.description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="price" class="block mb-1 text-gray-500 text-sm font-medium uppercase tracking-wider">
                            {{ __('services.price') }}
                        </label>
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-gray-500">$</span>
                            <input id="price" wire:model.defer="form.price" type="number" step="0.01"
                                class="w-full p-2 pl-8 border rounded focus:ring focus:ring-blue-200 dark:bg-zinc-800 dark:text-white">
                        </div>
                        @error('form.price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="duration" class="block mb-1 text-gray-500 text-sm font-medium uppercase tracking-wider">
                            {{ __('services.duration') }} (minutes)
                        </label>
                        <input id="duration" wire:model.defer="form.duration_minutes" type="number"
                            class="w-full p-2 border rounded focus:ring focus:ring-blue-200 dark:bg-zinc-800 dark:text-white">
                        @error('form.duration_minutes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="max_bookings"
                            class="block mb-1 text-gray-500 text-sm font-medium uppercase tracking-wider">
                            {{ __('services.maxBookingsPerDay') }}
                        </label>
                        <input id="max_bookings" wire:model.defer="form.max_bookings_per_day" type="number"
                            class="w-full p-2 border rounded focus:ring focus:ring-blue-200 dark:bg-zinc-800 dark:text-white">
                        @error('form.max_bookings_per_day') <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
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
                                class="flex-1 p-2 border rounded focus:ring focus:ring-blue-200 dark:bg-zinc-800 dark:text-white">
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
                            class="w-full p-2 border rounded focus:ring focus:ring-blue-200 dark:bg-zinc-800 dark:text-white">
                            <option value="active">{{ __('services.active') }}</option>
                            <option value="inactive">{{ __('services.inactive') }}</option>
                        </select>
                        @error('form.status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
                </div>
            </div>
        @endif
    </div>



</div>