<div class="flex flex-col gap-6">

    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="">

        <div class="grid grid-cols-2 gap-4 sm:grid-cols-2">

            <flux:input wire:model="tenantName" :label="__('register.tenantName')" type="text" required
                :placeholder="__('register.tenantName')" />


            <flux:input wire:model="tenantEmail" :label="__('register.tenantEmail')" type="email"
                :placeholder="__('register.tenantEmail')" />



            <flux:input wire:model="tenantPhone" :label="__('register.tenantPhone')" type="phone"
                :placeholder="__('register.tenantPhone')" />

            <flux:input wire:model="tenantAddress" :label="__('register.tenantAddress')" type="address"
                :placeholder="__('register.tenantAddress')" required />

        </div>



        <div class="grid grid-cols-2 my-4 gap-4 sm:grid-cols-2">
            <flux:input wire:model="managerName" :label="__('register.managerName')" type="text" required
                autocomplete="name" :placeholder="__('register.managerName')" />

            <flux:input wire:model="managerEmail" :label="__('register.managerEmail')" type="email" required
                autocomplete="email" :placeholder="__('register.managerEmail')" />


            <flux:input wire:model="password" :label="__('Password')" type="password" required
                autocomplete="new-password" :placeholder="__('Password')" />


            <flux:input wire:model="password_confirmation" :label="__('Confirm password')" type="password" required
                autocomplete="new-password" :placeholder="__('Confirm password')" />
        </div>


        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div>