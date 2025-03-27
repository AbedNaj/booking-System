@props(['label'])
<div>
    <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ $label }}
        :</label>
    <p class="text-l font-semibold text-gray-900 dark:text-gray-100">{{ $slot }}</p>
</div>