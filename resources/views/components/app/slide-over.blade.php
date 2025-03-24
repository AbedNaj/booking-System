@props(['btnTitle' => 'click', 'slideTitle' => 'Add'])
<section class="">

    <div x-data="{ open: false }">

        <div @click="open = true">
            {{ $trigger }}
        </div>

        <div x-show="open" class="fixed inset-0 bg-black/30 z-40" @click="open = false"></div>

        <div x-show="open" x-transition:enter="transform transition ease-in-out duration-300"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in-out duration-300" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="fixed right-0 top-0 h-full w-full sm:w-1/4 bg-white dark:bg-zinc-900 shadow-lg z-50 p-6">


            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold text-gray-700 dark:text-gray-200">{{ $slideTitle }}</h2>
                <button @click="open = false"
                    class="text-gray-500 hover:text-gray-700  dark:hover:text-gray-300">&times;</button>
            </div>
            {{ $slot }}
        </div>
    </div>

</section>