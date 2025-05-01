@props(['model'])

@php
    $defaults = [
        'class' => 'w-full p-2 rounded-lg bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 text-sm text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:ring focus:ring-blue-500 focus:outline-none',
        'type' => 'text',

    ]
@endphp
<div>
    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1 ">{{ $slot }}
        :</label>
    <input wire:model.defer="{{ $model }}" {{ $attributes->merge($defaults) }}>

    @error($model)
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>