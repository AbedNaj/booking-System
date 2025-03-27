<div>
    <x-app.index-header>{{ __('employees.title') }}</x-app.index-header>
    <section class="flex space-x-2">


        <x-app.slide-over :slideTitle=" __('employees.add')">
            <x-slot:trigger>
                <flux:button variant="primary" class="mb-2  hover:cursor-pointer">{{ __('employees.add') }}
                </flux:button>
            </x-slot:trigger>
            <livewire:app.employees.employees-create>

        </x-app.slide-over>


        <flux:button variant="primary" href="{{ route('app.employees-types.index') }}"
            class="mb-2  hover:cursor-pointer">{{ __('employees.typesManagement') }}
        </flux:button>
    </section>


    <livewire:app.common.table listener='employeeAdd' model="\App\Models\Employees" :columns="[
        ['field' => 'name', 'label' => __('employees.serviceName')],
        ['field' => 'email', 'label' => __('employees.email')],
        ['field' => 'phone', 'label' => __('employees.phone')],
        ['field' => 'hire_date', 'label' => __('employees.hire_date')],
        ['field' => 'description', 'label' => __('employees.description')],
        ['field' => 'status', 'label' => __('employees.status')],
    ]" :filters="[
        ['field' => 'tenants_id', 'operator' => '=', 'value' => auth()->user()->tenants_id]
    ]" :title="__('employees.employeeList')" detailsRouteName="app.employees.show" />
</div>