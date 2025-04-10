@props(['data'])
<div
    class="group bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col transition-all duration-500 hover:-translate-y-2 hover:shadow-xl">
    <div class="relative overflow-hidden">
        <img src="{{ $data->image ? Storage::disk('do')->url($data->image) : ''}}" alt="{{ $data->name }}"
            class=" w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110">

    </div>
    <div class="p-6 flex flex-col flex-grow justify-between">
        <div>
            <div class="flex items-center mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                </svg>
                <h2 class="text-2xl font-bold text-gray-800">{{ $data->name }}</h2>
            </div>
            <p class="text-gray-600">
                {{ $data->description }}

            </p>

            <div class="flex flex-wrap gap-2 mt-4">
                <span
                    class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Min{{ $data->duration_minutes }}</span>
                <span
                    class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ $data->category->name }}</span>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-between">
            <div>
                <span class="text-blue-600 font-bold text-2xl">${{ $data->price }}</span>

            </div>
            <a href="{{ route('tenant.service.show', $data->id) }}"
                class="bg-blue-600 text-white px-6 py-2.5 rounded-lg font-medium hover:bg-blue-700 transform transition hover:scale-105 focus:ring-2 focus:ring-blue-300 focus:outline-none">
                احجز الآن
            </a>
        </div>
    </div>
</div>