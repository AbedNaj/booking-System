@props(['target' => 'model'])
<button type="submit" wire:target="{{ $target }}" wire:loading.attr="disabled"
    class="w-full hover:cursor-pointer bg-green-600 text-white py-3 rounded-md hover:bg-green-700 transition focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 relative flex justify-center items-center">


    <span wire:loading.remove wire:target="{{ $target }}">
        {{ $slot }}
    </span>


    <span wire:loading wire:target="{{ $target }}" class="flex items-center gap-1">
        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
            </circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
            </path>
        </svg>
        Loading...
    </span>

</button>