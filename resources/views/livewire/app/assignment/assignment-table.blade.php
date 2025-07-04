<div>
    <div class="overflow-x-auto bg-white dark:bg-zinc-900 p-6 shadow-lg rounded-xl">
        <h2 class="text-2xl font-bold mb-6 text-gray-700 dark:text-gray-100">{{ __('assignment.list') }}</h2>
        <table class="w-full border-collapse border-spacing-0 rounded-xl overflow-hidden">
            <thead>
                <tr
                    class="bg-gradient-to-r from-blue-100 via-blue-50 to-blue-100 dark:from-zinc-700 dark:via-zinc-600 dark:to-zinc-700">

                    <th
                        class="p-4 text-gray-700 dark:text-gray-100 text-sm font-semibold text-center border-b border-gray-300 dark:border-zinc-700">
                        {{ __('assignment.serviceName') }}
                    </th>

                    <th
                        class="p-4 text-gray-700 dark:text-gray-100 text-sm font-semibold text-center border-b border-gray-300 dark:border-zinc-700">
                        {{ __('assignment.assigned') }}
                    </th>
                    <th
                        class="p-4 text-gray-700 dark:text-gray-100 text-sm font-semibold text-center border-b border-gray-300 dark:border-zinc-700">
                        {{ __('Actions') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $data)
                    <tr class="hover:bg-gray-100 dark:hover:bg-zinc-800 transition-all text-center">

                        <td class="p-4 border-b border-gray-200 dark:border-zinc-700 text-gray-800 dark:text-gray-200">
                            {{ $data->name }}
                        </td>

                        <td class="p-4 border-b border-gray-200 dark:border-zinc-700 text-gray-800 dark:text-gray-200">
                            {{ $data->assignment_count }}
                        </td>

                        <td class="p-4 border-b border-gray-200 dark:border-zinc-700">
                            <a href="{{ route('app.assignments.show', $data->id) }}"
                                class="px-3 py-1 text-xs font-semibold text-white bg-blue-500 rounded hover:bg-blue-600">
                                {{ __('assignment.details') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
                @if ($datas->isEmpty())


                    <tr>
                        <td colspan="{{ count($datas) + 1 }}" class="p-4 text-center text-gray-500 dark:text-gray-400">
                            {{ __('No data found.') }}
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="mt-6">
            {{ $datas->links() }}
        </div>
    </div>
</div>