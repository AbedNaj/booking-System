<div class="max-w-6xl mx-auto py-12 space-y-10">


    <div class="text-center space-y-1">
        <h1 class="text-4xl font-extrabold text-white tracking-tight">{{ __('assignment.service') }}: <span
                class="text-blue-400">{{ $service->name }}</span></h1>
        <p class="text-gray-400 text-sm">
            {{ __('assignment.showSubtitle') }}
        </p>
    </div>

    <div class="bg-zinc-800 p-6 rounded-2xl shadow-xl space-y-6 border border-zinc-700">
        <h2 class="text-2xl font-semibold text-white">{{ __('assignment.AssignedEmployees') }}</h2>

        <ul class="space-y-4">

            @foreach ($assigned as $assign)
                <li
                    class="bg-zinc-900 p-5 rounded-xl flex flex-col md:flex-row md:items-center justify-between gap-4 shadow-inner hover:bg-zinc-800 transition">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold">
                            A</div>
                        <span class="text-lg font-medium text-white">{{ $assign->name }}</span>
                    </div>

                    <div class="flex items-center gap-4">
                        <label class="flex items-center gap-2 text-sm text-white">
                            <input type="radio" value="{{ $assign->id }}" wire:model.live='priority' name="priority"
                                class="accent-blue-500">
                            <span class="text-sm">{{ __('assignment.priority') }}</span>
                        </label>
                        <a wire:wire:navigate href="{{ route('app.assignments.edit', $assign->assignment) }}"
                            class="text-sm text-yellow-400 hover:text-yellow-300 hover:cursor-pointer transition">{{ __('assignment.edit') }}</a>
                        <a wire:click='unassign({{ $assign->id }})'
                            class="text-sm text-red-400 hover:text-red-300 hover:cursor-pointer transition">{{ __('assignment.remove') }}</a>
                    </div>
                </li>
            @endforeach



        </ul>
    </div>


    <div class="bg-zinc-800 p-6 rounded-2xl shadow-xl space-y-6 border border-zinc-700">
        <h2 class="text-2xl font-semibold text-white">{{ __('assignment.UnassignedEmployees') }}</h2>

        <ul class="space-y-4">
            @foreach ($unassigned as $unassigne)
                <li
                    class="bg-zinc-900 p-5 rounded-xl flex items-center justify-between shadow-inner hover:bg-zinc-800 transition">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-10 h-10 rounded-full bg-purple-500 flex items-center justify-center text-white font-bold">
                            A</div>
                        <span class="text-lg font-medium text-white">{{ $unassigne->name }}</span>
                    </div>

                    <button wire:click='assign({{ $unassigne->id }})'
                        class="text-sm text-green-400 hover:text-green-300 hover:cursor-pointer transition">{{ __('assignment.assign') }}</button>
                </li>
            @endforeach



        </ul>
    </div>

</div>