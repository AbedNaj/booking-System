<div>
    <form wire:submit.prevent='TypeAdd' enctype="multipart/form-data" class="flex flex-col gap-4">

        <flux:input wire:model="name" :label="__('employee-types.name')" />
        <flux:input wire:model="description" :label="__('employee-types.description')" />

        <flux:button type="submit" variant="primary" class="w-full hover:cursor-pointer">{{ __('employee-types.add') }}
        </flux:button>

    </form>
</div>