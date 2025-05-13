<div>

    <form wire:submit.prevent='customerAdd' class="flex flex-col gap-4">
        <flux:input wire:model="name" :label="__('customers.customerName')" />
        <flux:input wire:model="email" :label="__('customers.customerEmail')" />
        <flux:input wire:model="password" type="password" :label="__('customers.password')" />
        <flux:input wire:model="phone" :label="__('customers.customerPhone')" />
        <flux:input wire:model="address" :label="__('customers.customerAddress')" />
        <flux:textarea wire:model="notes" :label="__('customers.notes')" />
        <flux:button type="submit" variant="primary" class="w-full hover:cursor-pointer">{{ __('category.add') }}
        </flux:button>

    </form>

</div>
