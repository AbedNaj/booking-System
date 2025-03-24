<div>
    <div class="overflow-x-auto  bg-white dark:bg-zinc-900 p-4 shadow-md rounded-lg">
        <table class="w-full text-left border-collapse border border-gray-300 dark:border-zinc-700">
            <thead class="bg-blue-100 text-center dark:bg-blue-900">
                <tr>
                    <th class="p-3 border border-gray-300 dark:border-zinc-700 text-blue-900 dark:text-blue-200">#</th>
                    <th class="p-3 border border-gray-300 dark:border-zinc-700 text-blue-900 dark:text-blue-200">
                        {{ __('category.inputTitle') }}
                    </th>
                    <th class="p-3 border border-gray-300 dark:border-zinc-700 text-blue-900 dark:text-blue-200">
                        {{ __('category.description') }}
                    </th>
                    <th
                        class="p-3 border border-gray-300 dark:border-zinc-700 text-center text-blue-900 dark:text-blue-200">
                        {{ __('category.actions') }}

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="hover:bg-gray-200 text-center  dark:hover:bg-zinc-800 transition">
                        <td class="p-3 border border-gray-300 dark:border-zinc-700">{{ $category->id }}</td>
                        <td class="p-3 border border-gray-300 dark:border-zinc-700">{{ $category->name }}</td>
                        <td class="p-3 border border-gray-300 dark:border-zinc-700">{{ $category->description }}</td>

                        <td class="p-3 border border-gray-300 dark:border-zinc-700">
                            <div class="flex justify-center gap-2">
                                <a href='{{ route('app.category.show', $category->id) }}' wire:navigate
                                    class="px-3 py-1 text-xs font-semibold text-white bg-blue-500 rounded hover:bg-blue-600">
                                    {{ __('category.details') }}
                                </a>

                        </td>

                    </tr>
                @endforeach



            </tbody>
        </table>

    </div>
    <div class="mt-4">
        {{ $categories->links() }}
    </div>
</div>