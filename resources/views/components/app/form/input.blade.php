@props(['model'])
<div>
    <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ $slot }}
        :</label>
    <input wire:model.defer="{{ $model }}" type="text"
        class="w-full p-2 border rounded dark:bg-zinc-800 dark:text-white">
    @error($model)
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>