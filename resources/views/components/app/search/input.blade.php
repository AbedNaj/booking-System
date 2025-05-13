@props(['placeholder' => 'Search...', 'wireModel' => ''])

<div class="w-full sm:w-1/4">
    <label for="customerSearch" class="block text-sm text-gray-700 dark:text-gray-200 mb-1">
        {{ $slot }}
    </label>
    <input type="text" id="customerSearch" wire:model.live="{{ $wireModel }}" placeholder="{{ $placeholder }}"
        class="w-full p-2 rounded-lg bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 text-sm text-gray-800 dark:text-white focus:ring focus:ring-blue-500 focus:outline-none" />
</div>
