<div>
    <div class="overflow-x-auto bg-white dark:bg-zinc-900 p-6 shadow-lg rounded-xl">
        <section class="flex justify-between mb-4">

            <h2 class="text-2xl font-bold mb-6 text-gray-700 dark:text-gray-100">{{ $title }}</h2>
            @if ($allowSearch == true)
                <div>
                    <flux:input icon="magnifying-glass" wire:model.live="search" :placeholder="__('services.serach')" />
                </div>
            @endif


        </section>


        <table class="w-full border-collapse border-spacing-0 rounded-xl overflow-hidden">
            <thead>
                <tr
                    class="bg-gradient-to-r from-blue-100 via-blue-50 to-blue-100 dark:from-zinc-700 dark:via-zinc-600 dark:to-zinc-700">
                    @foreach ($columns as $column)
                        <th
                            class="p-4 text-gray-700 dark:text-gray-100 text-sm font-semibold text-center border-b border-gray-300 dark:border-zinc-700">
                            {{ $column['label'] }}
                        </th>
                    @endforeach
                    <th
                        class="p-4 text-gray-700 dark:text-gray-100 text-sm font-semibold text-center border-b border-gray-300 dark:border-zinc-700">
                        {{ __('Actions') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($rows as $row)
                    <tr class="hover:bg-gray-100 dark:hover:bg-zinc-800 transition-all text-center">
                        @foreach ($columns as $column)
                            <td
                                class="p-4 border-b border-gray-200 dark:border-zinc-700 text-gray-800 dark:text-gray-200">
                                @php
                                    $value = data_get($row, $column['field']);
                                @endphp

                                @if (isset($column['enum']) && enum_exists($column['enum']))
                                    @php
                                        $enumClass = $column['enum'];
                                        $enumValue = $enumClass::tryFrom($value);
                                    @endphp

                                    @if ($enumValue)
                                        <span
                                            class="inline-flex items-center px-2 py-1 text-xs font-medium rounded 
                             bg-{{ $enumValue->color() }}-100 
                             text-{{ $enumValue->color() }}-800">
                                            {{ $enumValue->label() }}
                                        </span>
                                    @else
                                        {{ $value }}
                                    @endif
                                @else
                                    {{ $value }}
                                @endif
                            </td>
                        @endforeach

                        <td class="p-4 border-b border-gray-200 dark:border-zinc-700">
                            <a href="{{ route($detailsRouteName, $row->id) }}" wire:navigate
                                class="px-3 py-1 text-xs font-semibold text-white bg-blue-500 rounded hover:bg-blue-600 hover:cursor-pointer shadow-sm transition-all duration-300">
                                {{ __('Details') }}
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($columns) + 1 }}"
                            class="p-4 text-center text-gray-500 dark:text-gray-400">
                            {{ __('No data found.') }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-6">
            {{ $rows->links() }}
        </div>
    </div>
</div>
