@props(['title'])
<div class="flex items-center bg-white p-4 rounded-xl shadow-sm">
    <div class="bg-blue-100 p-3 rounded-lg ml-4">
        {{ $icon }}
    </div>
    <div>
        <p class="text-gray-500 text-sm">{{ $title }}</p>
        <p class="font-bold text-lg">
            {{ $slot }}
        </p>
    </div>
</div>