@props(['model', 'datas', 'label'])
<div>
<label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ $label }}
    :</label>
<select wire:model.defer="{{ $model }}" class="w-full p-2 border rounded dark:bg-zinc-800 dark:text-white">
    <option value="">{{ $slot }}</option>
    @foreach ($datas as $data)
        <option value="{{ $data->id }}">{{ $data->name }}</option>
    @endforeach

</select>
@error($model)
    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
@enderror
</div>