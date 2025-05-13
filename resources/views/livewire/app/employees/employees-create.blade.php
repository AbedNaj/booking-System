<div>
    <form wire:submit.prevent='EmployeeAdd' enctype="multipart/form-data" class="flex flex-col gap-4">

        <flux:input wire:model="name" :label="__('employees.name')" />
        <flux:input wire:model="email" :label="__('employees.email')" />
        <flux:input wire:model="phone" :label="__('employees.phone')" />
        <flux:input wire:model="description" :label="__('employees.description')" />

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
</div>
