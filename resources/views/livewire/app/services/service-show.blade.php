<div>
    <div class="p-6 bg-white dark:bg-zinc-900 rounded-lg shadow">
        <h1 class="text-3xl font-extrabold mb-6 text-gray-800 dark:text-gray-100 border-b pb-2">
            {{ __('services.serviceDetails') }}
        </h1>

        @if (session()->has('success'))
            <x-app.alert message="{{ session('success') }}"></x-app.alert>
        @endif

        @if($editing)
            <div class="space-y-6">
                <div>
                    <label
                        class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ __('services.serviceName') }}
                        :</label>
                    <input wire:model.defer="form.name" type="text"
                        class="w-full p-2 border rounded dark:bg-zinc-800 dark:text-white">
                </div>

                <div>
                    <label
                        class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ __('services.description') }}
                        :</label>
                    <textarea wire:model.defer="form.description"
                        class="w-full p-2 border rounded dark:bg-zinc-800 dark:text-white"></textarea>
                </div>

                <div>
                    <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ __('services.price') }}
                        :</label>
                    <input wire:model.defer="form.price" type="number"
                        class="w-full p-2 border rounded dark:bg-zinc-800 dark:text-white">
                </div>

                <div>
                    <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ __('services.duration') }}
                        (minutes) :</label>
                    <input wire:model.defer="form.duration_minutes" type="number"
                        class="w-full p-2 border rounded dark:bg-zinc-800 dark:text-white">
                </div>

                <div>
                    <label
                        class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ __('services.maxBookingsPerDay') }}
                        :</label>
                    <input wire:model.defer="form.max_bookings_per_day" type="number"
                        class="w-full p-2 border rounded dark:bg-zinc-800 dark:text-white">
                </div>

                <div>
                    <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ __('services.category') }}
                        :</label>
                    <select wire:model.defer="form.category_id"
                        class="w-full p-2 border rounded dark:bg-zinc-800 dark:text-white">
                        <option value="">{{ __('services.selectCategory') }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ __('services.image') }}
                        :</label>

                    <input type="file" wire:model="image"
                        class="w-full p-2 border rounded dark:bg-zinc-800 dark:text-white">
                </div>

                <div>
                    <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ __('services.status') }}
                        :</label>
                    <select wire:model.defer="form.status"
                        class="w-full p-2 border rounded dark:bg-zinc-800 dark:text-white">
                        <option value="active">{{ __('services.active') }}</option>
                        <option value="inactive">{{ __('services.inactive') }}</option>
                    </select>
                </div>

                <div class="flex gap-2 mt-8">
                    <button wire:click="save"
                        class="px-5 py-2 bg-green-600 text-white rounded hover:bg-green-700 hover:cursor-pointer text-lg">
                        {{ __('services.save') }}
                    </button>
                    <button wire:click="$set('editing', false)"
                        class="px-5 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 hover:cursor-pointer text-lg">
                        {{ __('services.cancel') }}
                    </button>
                </div>
            </div>

        @else
            <div class="space-y-6">
                <div>
                    <label
                        class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ __('services.serviceName') }}
                        :</label>
                    <p class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $service->name }}</p>
                </div>

                <div>
                    <label
                        class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ __('services.description') }}
                        :</label>
                    <p class="text-gray-700 dark:text-gray-200 leading-relaxed">{{ $service->description }}</p>
                </div>

                <div>
                    <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ __('services.price') }}
                        :</label>
                    <p class="text-lg font-bold text-green-600 dark:text-green-400">${{ $service->price }}</p>
                </div>

                <div>
                    <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ __('services.duration') }}
                        (minutes) :</label>
                    <p class="text-gray-800 dark:text-gray-100">{{ $service->duration_minutes }} minutes</p>
                </div>

                <div>
                    <label
                        class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ __('services.maxBookingsPerDay') }}
                        :</label>
                    <p class="text-gray-800 dark:text-gray-100">
                        {{ $service->max_bookings_per_day ?? __('services.nomaxbooking') }}
                    </p>
                </div>

                <div>
                    <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ __('services.category') }}
                        :</label>
                    <p class="text-gray-800 dark:text-gray-100">{{ $service->category->name ?? __('form.noCategory') }}</p>
                </div>

                <div>
                    <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ __('services.image') }}
                        :</label>
                    @if($service->image)
                        <img src="{{Storage::disk('do')->url($service->image) }}" class="w-32 h-32 object-cover rounded">
                    @else
                        <p class="text-gray-500">{{ __('services.noImage') }}</p>
                    @endif
                </div>

                <div>
                    <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ __('services.status') }}
                        :</label>
                    <p class="text-gray-800 dark:text-gray-100 font-medium">
                        {{ $service->status == 'active' ? __('services.active') : __('services.inactive') }}
                    </p>
                </div>

                <div class="flex gap-2 mt-8">
                    <button wire:click="enableEdit"
                        class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 hover:cursor-pointer text-lg">
                        {{ __('services.edit') }}
                    </button>
                    <button wire:click="delete" onclick="return confirm('{{ __('form.deleteMessage') }}')"
                        class="px-5 py-2 bg-red-600 text-white rounded hover:bg-red-700 hover:cursor-pointer text-lg">
                        {{ __('services.delete') }}
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>