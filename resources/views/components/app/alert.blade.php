@props(['type' => 'success', 'message' => ''])

<div>

    <div x-data="{show:true}" x-init="setTimeout(()=> show = false , 2000)" x-show="show" x-transition
        class="p-4 rounded mb-4 font-semibold"
            :class="{
        'bg-green-100 text-green-700 dark:bg-green-800 dark:text-green-200': '{{ $type }}' === 'success',
        'bg-red-100 text-red-700 dark:bg-red-800 dark:text-red-200': '{{ $type }}' === 'error',
        'bg-yellow-100 text-yellow-700 dark:bg-yellow-800 dark:text-yellow-200': '{{ $type }}' === 'warning',
        'bg-blue-100 text-blue-700 dark:bg-blue-800 dark:text-blue-200': '{{ $type }}' === 'info',
    }"
        >  {{ $message }}</div>
</div>