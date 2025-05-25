<div x-data="{ isOpen: false }" class="relative">

    <button @click="isOpen = !isOpen" class="flex items-center hover:cursor-pointer space-x-2 text-sm focus:outline-none">
        <div
            class="h-8 w-8 rounded-full bg-indigo-600 dark:bg-indigo-500 flex items-center justify-center text-white font-medium">
            {{ collect(explode(' ', $userName))->map(fn($part) => strtoupper($part[0]))->take(2)->implode('') }}
        </div>
        <span class="hidden md:block font-medium text-gray-800 dark:text-white">{{ $userName }}</span>
        <svg class="h-5 w-5 text-gray-500 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
            fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </button>


    <div x-show="isOpen" x-cloak @click.away="isOpen = false"
        class="absolute right-0 mt-2 w-48 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-lg shadow-lg z-50"
        x-transition>
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
            <li
                class="w-full text-left hover:cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-700 text-white-600 dark:text-black-400">
                {{ $userEmail }}
            </li>
            <li>
                <form method="POST" wire:submit.prevent='logout'>
                    @csrf
                    <button type="submit"
                        class="w-full text-left hover:cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-700 text-red-600 dark:text-red-400">
                        {{ __('user-drop.logout') }}
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
