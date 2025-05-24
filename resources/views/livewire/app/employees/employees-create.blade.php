<div>
    <form wire:submit.prevent='EmployeeAdd' enctype="multipart/form-data" class="flex flex-col gap-4">

        <flux:input wire:model="name" :label="__('employees.name')" />
        <flux:input wire:model="email" :label="__('employees.email')" />
        <flux:input wire:model="phone" :label="__('employees.phone')" />
        <flux:textarea wire:model="description" :label="__('employees.description')" />

        <flux:input type="file" wire:model="image" label="Picture" />

        <flux:select wire:model='employee_type_id' label="{{ __('employees.typeSelect') }}">
            <option value="">{{ __('employees.typeSelect') }}</option>
            @foreach ($employeeTypes as $employeeType)
                <option value="{{ $employeeType->id }}">{{ $employeeType->name }}</option>
            @endforeach
        </flux:select>
        <div>
            <label for="hire_date" class="block text-sm font-medium text-gray-200 mb-1">
                {{ __('employees.hire_date') }}
            </label>
            <input type="date" wire:model="hire_date" id="hire_date"
                class="w-full rounded-md border-gray-700 bg-gray-800 text-gray-100 p-2 focus:ring focus:ring-indigo-500" />
        </div>

        <flux:select wire:model='status' label="{{ __('services.status') }}">
            @foreach ($statusOptions as $statusOption)
                <option value="{{ $statusOption->value }}">{{ $statusOption->label() }}</option>
            @endforeach
        </flux:select>

        <flux:button type="submit" variant="primary" class="w-full hover:cursor-pointer">
            {{ __('employee-types.add') }}
        </flux:button>

    </form>

    <div x-data="{ open: false }" x-on:empty-default-password.window="open = true" x-cloak>

        <div x-show="open" class="fixed inset-0 bg-black bg-opacity-40 z-40" x-transition.opacity></div>


        <div x-show="open" x-transition class="fixed inset-0 flex items-center justify-center z-50">
            <div
                class="bg-white dark:bg-zinc-800 rounded-lg shadow-lg max-w-md w-full p-6 text-center border border-gray-200 dark:border-zinc-700">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">
                    {{ __('You must set a default password') }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-6">
                    {{ __('Please go to the settings page and add a default password to continue.') }}
                </p>
                <div class="flex justify-center gap-4">
                    <a href="{{ route('settings.employee') }}"
                        class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                        {{ __('Go to Settings') }}
                    </a>
                    <button @click="open = false"
                        class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">
                        {{ __('Cancel') }}
                    </button>
                </div>
            </div>
        </div>
    </div>


</div>
