<div class="p-4 bg-gray-50 dark:bg-zinc-900" x-data="{ tab: @entangle('tab').live, viewStyle: @entangle('viewStyle') }">
    <div class="mb-4 flex flex-wrap items-center justify-between gap-3">
        <h1 class="text-xl font-bold text-gray-900 dark:text-white">My Appointments</h1>
        <div class="flex gap-2 flex-wrap">
            <div class="relative">
                <input type="text" placeholder="Search..."
                    class="pl-8 pr-3 py-1 rounded-lg text-sm border border-gray-300 dark:border-zinc-700 dark:bg-zinc-800 dark:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 absolute left-2 top-1.5 text-gray-400"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <button @click="viewStyle = 'grid'"
                :class="viewStyle === 'grid' ? 'bg-blue-500 text-white' :
                    'bg-white dark:bg-zinc-800 text-gray-700 dark:text-gray-300'"
                class="p-1 rounded-lg text-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
            </button>
            <button @click="viewStyle = 'list'"
                :class="viewStyle === 'list' ? 'bg-blue-500 text-white' :
                    'bg-white dark:bg-zinc-800 text-gray-700 dark:text-gray-300'"
                class="p-1 rounded-lg text-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <div class="mb-4 flex gap-2 flex-wrap">
        <button @click="tab = 'all'"
            :class="tab === 'all' ? 'bg-blue-500 text-white' : 'bg-white dark:bg-zinc-800 text-gray-700 dark:text-gray-300'"
            class="px-3 py-1 rounded-lg text-sm font-medium transition-colors">All</button>
        <button @click="tab = 'upcoming'"
            :class="tab === 'upcoming' ? 'bg-blue-500 text-white' : 'bg-white dark:bg-zinc-800 text-gray-700 dark:text-gray-300'"
            class="px-3 py-1 rounded-lg text-sm font-medium transition-colors">Upcoming</button>
        <button @click="tab = 'today'"
            :class="tab === 'today' ? 'bg-blue-500 text-white' : 'bg-white dark:bg-zinc-800 text-gray-700 dark:text-gray-300'"
            class="px-3 py-1 rounded-lg text-sm font-medium transition-colors">Today</button>
        <button @click="tab = 'past'"
            :class="tab === 'past' ? 'bg-blue-500 text-white' : 'bg-white dark:bg-zinc-800 text-gray-700 dark:text-gray-300'"
            class="px-3 py-1 rounded-lg text-sm font-medium transition-colors">Past</button>

        <select wire:model.live="selectedCategory"
            class="px-3 py-1 rounded-lg text-sm border border-gray-300 dark:border-zinc-700 dark:bg-zinc-800 dark:text-white">
            <option value="">All Categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>


        <select wire:model.live="status"
            class="px-3 py-1 rounded-lg text-sm border border-gray-300 dark:border-zinc-700 dark:bg-zinc-800 dark:text-white">
            <option value="">Booking Status</option>
            @foreach ($statusOptions as $option)
                <option value="{{ $option->value }}">{{ $option->label() }}</option>
            @endforeach
        </select>
    </div>

    <div x-cloak :class="viewStyle === 'grid' ? 'grid md:grid-cols-2 lg:grid-cols-3 gap-4' : 'flex flex-col gap-3'">
        @foreach ($bookings as $booking)
            <x-app.employee-account.booking-card :data="$booking"></x-app.employee-account.booking-card>
        @endforeach






    </div>
</div>
