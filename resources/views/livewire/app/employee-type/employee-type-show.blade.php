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

                <x-app.form.input model="name">{{ __('employee-types.name') }}</x-app.form.input>
                <x-app.form.input model="description">{{ __('employee-types.description') }}</x-app.form.input>



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
                    <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ __('employee-types.name') }}
                        :</label>
                    <p class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $employeeTypes->name }}</p>
                </div>

                <div>
                    <label
                        class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ __('employee-types.description') }}
                        :</label>
                    <p class="text-gray-700 dark:text-gray-200 leading-relaxed">{{ $employeeTypes->description }}</p>
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