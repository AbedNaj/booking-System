<div class="flex flex-col gap-6">

    <x-auth-header
        :title="__('Create an account')"
        :description="__('Enter your details below to create your account')" />

    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">

        <flux:input
            wire:model="name"
            :label="__('register.name')"
            type="text"
            required
            autofocus
            autocomplete="name"
            :placeholder="__('register.name')" />


        <flux:input
            wire:model="email"
            :label="__('register.email')"
            type="email"
            required
            autocomplete="email"
            placeholder="email@example.com" />

        <flux:input
            wire:model="phone"
            :label="__('register.phone')"
            type="phone"
            placeholder="+970*********" />

        <flux:input
            wire:model="address"
            :label="__('register.address')"
            type="address"


            :placeholder="__('register.address')" />


        <flux:input
            wire:model="password"
            :label="__('Password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Password')" />


        <flux:input
            wire:model="password_confirmation"
            :label="__('Confirm password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Confirm password')" />

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