@props(['data'])

<div
    class="bg-white dark:bg-zinc-800 rounded-xl p-4 shadow border border-gray-200 dark:border-zinc-700 hover:shadow-lg transition-all duration-200">
    <div class="flex justify-between">
        <div class="flex items-center space-x-1 text-sm text-gray-500 dark:text-gray-400 mb-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>

            <span>{{ $data->date }} - {{ $data->start_time . '-' . $data->end_time }}</span>
        </div>
        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $data->duration }} min</span>
    </div>
    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">

        {{ $data->service->name ?? 'Serivce' }}
    </h2>
    <div class="flex items-center space-x-1 text-sm text-gray-600 dark:text-gray-300 mt-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
        <span>Customer: {{ $data->customer->name ?? '' }}</span>
    </div>
    <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">
        <span>{{ $data->customer->phone ?? 'No Phone Number Available' }}</span>
    </div>
    <div class="mt-3 flex justify-between items-center">
        <span @class([
            'inline-flex items-center px-2 py-1 text-xs rounded-lg font-medium',
            'bg-yellow-100 text-yellow-800' => $data->status === 'pending',
            'bg-blue-100 text-blue-800' => $data->status === 'confirmed',
            'bg-gray-200 text-gray-600' => $data->status === 'expired',
            'bg-red-100 text-red-800' => $data->status === 'cancelled',
            'bg-green-100 text-green-800' => $data->status === 'completed',
            'bg-orange-100 text-orange-800' => $data->status === 'no_show',
            'bg-pink-100 text-pink-800' => $data->status === 'rejected',
        ])>
            <span class="w-1.5 h-1.5 rounded-full bg-green-600 mr-1.5"></span>
            {{ $data->status }}
        </span>
        <div class="flex space-x-2">
            <a href="{{ route('app.employee.booking.details', ['booking' => $data->id]) }}"
                class="text-blue-500 hover:text-blue-700 text-sm font-medium hover:cursor-pointer">Details</a>
            <button class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
            </button>
        </div>
    </div>
</div>