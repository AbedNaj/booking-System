<div>
    <x-app.index-header>{{ __('employee-types.title') }}</x-app.index-header>
    <section class="flex space-x-2">
        <x-app.slide-over :slideTitle=" __('employees.add')">
            <x-slot:trigger>
                <flux:button variant="primary" class="mb-2  hover:cursor-pointer">{{ __('employee-types.add') }}
                </flux:button>
            </x-slot:trigger>
            <livewire:app.employee-type.employee-type-create>
        </x-app.slide-over>


    </section>
    <livewire:app.common.table listener='employeeTypeAdd' model="\App\Models\EmployeeTypes" :columns="[
        ['field' => 'name', 'label' => __('employee-types.typeName')],
        ['field' => 'description', 'label' => __('employee-types.description')],

    ]" :filters="[
        ['field' => 'tenants_id', 'operator' => '=', 'value' => auth()->user()->tenants_id]
    ]" :title="__('employee-types.employeeTypeList')"
        detailsRouteName="app.employees-types.show" />
</div>