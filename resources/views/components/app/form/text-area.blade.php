@props(['model'])
@php
    $defaults = [
        'class' => 'w-full p-2 rounded-lg bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 text-sm text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:ring focus:ring-blue-500 focus:outline-none',
        'type' => 'text',
        'rows' => 4,
        'cols' => 50,
    ];
@endphp
<div>
    <label for="description" class="block mb-1 text-gray-500 text-sm font-medium uppercase tracking-wider">
        {{ $slot }}
    </label>
    <textarea id="description" wire:model.defer="{{ $model }}" {{ $attributes->merge($defaults) }}></textarea>


    @error('form.description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>