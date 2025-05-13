@props(['type', 'click'])

@if ($type == 'edit')
    <button wire:click="enableEdit"
        class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 hover:cursor-pointer text-lg">
        {{ $slot }}
    </button>


@elseif ($type == 'delete')
    <button @click="deleteConfirm = true"
        class="px-5 py-2 bg-red-600 text-white rounded hover:bg-red-700 hover:cursor-pointer text-lg">
        {{ $slot }}
    </button>

@elseif ($type == 'save')
    <button wire:click="save"
        class="px-5 py-2 bg-green-600 text-white rounded hover:bg-green-700 hover:cursor-pointer text-lg">
        {{ $slot }}
    </button>
@elseif ($type == 'cancel')

    <button wire:click="$set('editing', false)"
        class="px-5 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 hover:cursor-pointer text-lg">
        {{ $slot }}
    </button>
@endif