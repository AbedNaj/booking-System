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

    <livewire:app.category.category-table>

</div>