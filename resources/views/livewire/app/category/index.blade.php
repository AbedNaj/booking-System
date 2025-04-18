<div>

    <section class="mb-4 space-y-2 ">
        <h1 class="text-2xl dark:border-zinc-700">{{ __('category.title') }}</h1>
        <flux:separator />
    </section>


    <x-app.slide-over :slideTitle=" __('category.add')">
        <x-slot:trigger>
            <flux:button class="mb-2 hover:cursor-pointer">{{ __('category.add') }}</flux:button>
        </x-slot:trigger>

        @livewire('app.category.category-create')
    </x-app.slide-over>


    <livewire:app.common.table listener="categoryAdded" model="\App\Models\Category" :columns="[
        ['field' => 'name', 'label' => __('category.categoryName')],
        ['field' => 'description', 'label' => __('category.categoryDescription')],

    ]" :filters="[
        ['field' => 'tenants_id', 'operator' => '=', 'value' => auth()->user()->tenants_id]
    ]" title="{{ __('category.list') }}" detailsRouteName="app.category.show"></livewire:app.common.table>
</div>