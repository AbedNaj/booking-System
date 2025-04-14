@props(['model' => 'model'])

@php
    $defaules = [

        'type' => 'text',
        'placeholder' => '',
        'label' => '',
        'required' => false,
        'class' => 'w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500',
    ];
@endphp
<div class="mb-4">
    <label class="block text-gray-700 mb-2 font-medium">{{ $slot }}</label>
    <div class="relative">
        <input wire:model.defer='{{ $model }}' {{ $attributes->merge($defaules) }}>
    </div>

    @error($model)
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>