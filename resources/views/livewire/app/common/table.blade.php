<div>

    <div class="overflow-x-auto bg-white dark:bg-zinc-900 p-4 shadow-md rounded-lg">
        <h2 class="text-xl font-bold mb-4 text-gray-700 dark:text-gray-200">{{ $title }}</h2>
        <table class="w-full border-collapse border border-gray-300 dark:border-zinc-700">
            <thead class="bg-blue-100 dark:bg-blue-900">
                <tr>
                    @foreach($columns as $column)
                        <th class="p-3 text-blue-900 dark:text-blue-200">{{ $column['label'] }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $row)
                    <tr class="hover:bg-gray-200 dark:hover:bg-zinc-800 transition">
                        @foreach($columns as $column)
                            <td class="p-3 border border-gray-300 dark:border-zinc-700">
                                {{ data_get($row, $column['field']) }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>