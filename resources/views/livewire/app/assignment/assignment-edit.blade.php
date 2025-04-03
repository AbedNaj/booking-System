<div class="bg-white dark:bg-zinc-900 shadow-lg rounded-xl p-6 overflow-hidden">

    <div class="pb-4 mb-6 border-b border-gray-200 dark:border-zinc-800">
        <h2 class="text-2xl font-bold text-zinc-800 dark:text-white flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            {{ __('assignment.editAssignment') }}
        </h2>
    </div>
    @if (session()->has('success'))
        <x-app.alert :message="__('assignment.update_success')"></x-app.alert>
    @endif

    <form wire:submit.prevent="save" class="space-y-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="relative">
                <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-200 mb-1">
                    {{ __('assignment.custom_price') }}
                </label>
                <div class="relative">
                    <span
                        class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 dark:text-gray-400">$</span>
                    <input type="text" wire:model.defer="custom_price" placeholder="e.g. 29.99"
                        class="w-full pl-8 p-2 border rounded-lg dark:bg-zinc-800 dark:text-white border-gray-300 dark:border-zinc-700 focus:ring focus:ring-blue-500/30 focus:border-blue-500 transition-all">
                </div>
            </div>


            <div>
                <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-200 mb-1">
                    {{ __('assignment.duration_override') }}
                </label>
                <div class="relative">
                    <input type="number" wire:model.defer="duration_override" placeholder="e.g. 60"
                        class="w-full p-2 border rounded-lg dark:bg-zinc-800 dark:text-white border-gray-300 dark:border-zinc-700 focus:ring focus:ring-blue-500/30 focus:border-blue-500 transition-all">
                    <span
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 dark:text-gray-400">min</span>
                </div>
            </div>


            <div class="bg-gray-50 dark:bg-zinc-800/50 p-3 rounded-lg flex items-center justify-between">
                <span class="text-sm font-medium text-zinc-700 dark:text-zinc-200">
                    {{ __('assignment.is_available') }}
                </span>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" wire:model.defer="is_available" class="sr-only peer">
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-zinc-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                </label>
            </div>


            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-200 mb-1">
                    {{ __('assignment.notes') }}
                </label>
                <textarea wire:model.defer="notes" rows="4"
                    placeholder="Add any additional notes or instructions here..."
                    class="w-full p-3 border rounded-lg dark:bg-zinc-800 dark:text-white border-gray-300 dark:border-zinc-700 focus:ring focus:ring-blue-500/30 focus:border-blue-500 transition-all"></textarea>
            </div>
        </div>


        <div class="flex justify-between pt-4 border-t border-gray-200 dark:border-zinc-800">
            <button type="button"
                class="px-4 py-2 bg-gray-100 dark:bg-zinc-800 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-zinc-700 transition-all text-sm">
                {{ __('assignment.cancel') }}
            </button>
            <button type="submit" wire:loading.attr="disabled" wire:target="save"
                class="px-6 py-2 hover:cursor-pointer bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all text-sm font-medium flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ __('assignment.save_changes') }}
            </button>

        </div>
    </form>
</div>