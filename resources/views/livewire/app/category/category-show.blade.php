<div>
    <div class="p-6 bg-white dark:bg-zinc-900 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4 text-gray-700 dark:text-gray-200">{{ __('category.categoryDetails') }}</h1>

        @if (session()->has('success'))
            <x-app.alert message=" {{ session('success') }}"></x-app.alert>
        @endif

        <div class="space-y-4">
            <div>
                <label class="block mb-1 text-gray-600 dark:text-gray-300">{{ __('category.categoryName') }} :</label>
                @if($editing)
                    <input wire:model.defer="name" type="text" value="{{ $category->name }}"
                        class="w-full p-2 border rounded dark:bg-zinc-800 dark:text-white">
                @else
                    <p class="text-gray-800 dark:text-gray-200">{{ $category->name }}</p>
                @endif
            </div>

            <div>
                <label class="block mb-1 text-gray-600 dark:text-gray-300">{{ __('category.description') }} :</label>
                @if($editing)
                    <textarea wire:model.defer="description" value="{{ $category->description }}"
                        class="w-full p-2 border rounded dark:bg-zinc-800 dark:text-white"></textarea>
                @else
                    <p class="text-gray-800 dark:text-gray-200">{{ $category->description }}</p>
                @endif
            </div>
        </div>

        <div class="flex gap-2 mt-6">
            @if($editing)
                <button wire:click="save"
                    class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 hover:cursor-pointer">
                    {{ __('category.save') }}
                </button>
                <button wire:click="$set('editing', false)"
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 hover:cursor-pointer">
                    {{ __('category.Cancel') }}
                </button>
            @else
                <button wire:click="enableEdit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 hover:cursor-pointer">
                    {{ __('category.edit') }}
                </button>
            @endif

            <button wire:click="delete" onclick="return confirm('{{ __('category.deleteMessage') }}')"
                class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 hover:cursor-pointer">
                {{ __('category.delete') }}
            </button>
        </div>
    </div>
</div>