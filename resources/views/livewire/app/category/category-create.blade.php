<div>


    <form wire:submit='catrgoryAdd' class="flex flex-col gap-4">
        <flux:input wire:model="name" :label="__('category.inputTitle')" />
        <flux:input wire:model="description" :label="__('category.description')" />
        <flux:button type="submit" variant="primary" class="w-full">{{ __('category.add') }}</flux:button>

    </form>

</div>