<div>
    <div class="p-6 bg-white dark:bg-zinc-900 rounded-lg shadow">
        <h1 class="text-3xl flex justify-between font-extrabold mb-6 text-gray-800 dark:text-gray-100 border-b pb-2">
            {{ __('employees.employeeDetails') }}
            <flux:button wire::navigate class="hover:cursor-pointer"
                href="{{ route('app.employees.account', ['employee' => $employee->id]) }}">
                {{ __('employees.AccountSettings') }}
            </flux:button>
        </h1>

        @if (session()->has('success'))
            <x-app.alert message="{{ session('success') }}"></x-app.alert>
        @endif

        @if ($editing)
            <div class="space-y-6">

                <x-app.form.input model="name">{{ __('employees.name') }}</x-app.form.input>
                <x-app.form.input model="description">{{ __('employees.description') }}</x-app.form.input>
                <x-app.form.input model="email">{{ __('employees.email') }}</x-app.form.input>
                <x-app.form.input model="phone">{{ __('employees.phone') }}</x-app.form.input>

                <x-app.form.select label="{{ __('employees.EmployeeType') }}" :datas="$employeeTypes"
                    model="employee_type_id">{{ __('employees.typeSelect') }}</x-app.form.select>



                <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ __('employees.status') }}
                    :</label>
                <select wire:model.defer="status" class="w-full p-2 border rounded dark:bg-zinc-800 dark:text-white">


                    <option value="active">{{ __('services.active') }}</option>
                    <option value="inactive">{{ __('services.inactive') }}</option>
                </select>

                <div>
                    <label for="hire_date" class="block text-sm font-medium text-gray-200 mb-1">
                        {{ __('employees.hire_date') }}
                    </label>
                    <input type="date" wire:model="hire_date" id="hire_date"
                        class="w-full rounded-md border-gray-700 bg-gray-800 text-gray-100 p-2 focus:ring focus:ring-indigo-500" />
                </div>
                <div class="flex items-center space-x-4">

                    @if ($employee->image)
                        <img src="{{ Storage::disk('do')->url($employee->image) }}"
                            class="w-16 h-16 object-cover rounded">
                    @endif
                    <input id="image" type="file" wire:model="image"
                        class="flex-1 w-full p-2 rounded-lg bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 text-sm text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:ring focus:ring-blue-500 focus:outline-none">
                </div>

                @error('image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror



                <div class="flex gap-2 mt-8">
                    <x-app.custome-buttons type="save"> {{ __('services.save') }}</x-app.custome-buttons>
                    <x-app.custome-buttons type="cancel"> {{ __('services.cancel') }}</x-app.custome-buttons>

                </div>
            </div>
        @else
            <div class="space-y-6">

                <x-app.label label="{{ __('employees.name') }}">{{ $employee->name }}</x-app.label>
                <x-app.label label="{{ __('employees.description') }}">{{ $employee->description }}</x-app.label>
                <x-app.label label="{{ __('employees.email') }}">{{ $employee->email }}</x-app.label>
                <x-app.label label="{{ __('employees.phone') }}">{{ $employee->phone }}</x-app.label>
                <x-app.label
                    label="{{ __('employees.EmployeeType') }}">{{ $employee->employeeType->name }}</x-app.label>
                <x-app.label label="{{ __('employees.status') }}">{{ $employee->status }}</x-app.label>
                <x-app.label label="{{ __('employees.hire_date') }}">{{ $employee->hire_date }}</x-app.label>

                @if ($employee->image)
                    <div class="mt-2">
                        <img src="{{ Storage::disk('do')->url($employee->image) }}"
                            class="w-64 h-48 object-cover rounded-lg shadow">
                    </div>
                @else
                    <p class="text-gray-500 italic">{{ __('services.noImage') }}</p>
                @endif
                <div class="flex gap-2 mt-8">

                    <x-app.custome-buttons type="edit"> {{ __('services.edit') }}</x-app.custome-buttons>
                    <x-app.custome-buttons type="delete"> {{ __('services.delete') }}</x-app.custome-buttons>
                </div>
            </div>
        @endif
    </div>
</div>
