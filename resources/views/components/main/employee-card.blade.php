@props(['data'])

<div :class="{
    ' bg-blue-50 transition border-blue-500': selectedEmployee === {{ $data->id }},
    'bg-white border-gray-200': selectedEmployee !== {{ $data->id }}
}"
    @click="selectedEmployee = {{ $data->id }} , selectedEmployeeName = '{{ $data->name }}'
   
    "
    class="bg-white border border-gray-200 rounded-xl p-4 cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition">
    <div class="flex items-center">
        <div class="w-14 h-14 rounded-full bg-blue-100 overflow-hidden ml-3">
            <img src="{{ $data->image ? Storage::disk('do')->url($data->image) : '' }}" alt='{{ $data->name }}'
                class="w-full h-full object-cover">
        </div>
        <div>
            <h4 class="font-bold">{{ $data->name }}</h4>
            <div class="flex items-center mt-1">
                <div class="flex items-center"></div>
            </div>
        </div>
    </div>
</div>
