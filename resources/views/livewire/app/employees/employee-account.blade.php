<div>
    <div class="bg-white dark:bg-zinc-900 rounded-xl p-6 shadow border border-gray-200 dark:border-zinc-700 space-y-6">
        <h1 class="text-3xl flex justify-between font-extrabold mb-6 text-gray-800 dark:text-gray-100 border-b pb-2">
            {{ __('employees.AccountSettings') }} - {{ $employee->name }}

        </h1>
        @if (session('success'))
            <x-app.alert :message="__('employees.accountUpdateSuccess')"></x-app.alert>
        @endif
        <form wire:submit.prevent="updateAccount" class="space-y-5">

            <x-app.form.input model="email">{{ __('employees.email') }}</x-app.form.input>



            <x-app.form.input model="password">{{ __('employees.password') }}</x-app.form.input>


            <div class="pt-2">
                <x-app.form.button></x-app.form.button>

            </div>
        </form>
    </div>


</div>