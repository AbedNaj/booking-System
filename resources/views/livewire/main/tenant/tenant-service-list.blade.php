<div>
    <section class="max-w-7xl mx-auto px-4 py-16">

        <div class="text-center mb-16">
            <h1
                class="text-5xl font-extrabold mb-6 bg-gradient-to-r from-blue-600 to-purple-600 inline-block text-transparent bg-clip-text">
                {{ $tenants->name }}
            </h1>

        </div>


        <div class="flex flex-wrap justify-center gap-4 mb-12" x-data="{ activeFilter: 'all' }">
            <button @click="activeFilter = 'all'" wire:click="getServices()"
                :class="{ 'bg-blue-600 text-white': activeFilter === 'all', 'bg-gray-100 text-gray-800': activeFilter !== 'all' }"
                class="px-6 py-2 rounded-full font-medium transition-all duration-300 hover:shadow-md">
               {{ __('tenant-service.all') }}
            </button>
            @foreach ($categories as $category)
                <button @click="activeFilter = {{ $category->id }}" wire:click="filterServices({{ $category->id }})"
                    :class="{
                        'bg-blue-600 text-white': activeFilter ===
                            {{ $category->id }},
                        'bg-gray-100 text-gray-800': activeFilter !== {{ $category->id }}
                    }"
                    class="px-6 py-2 rounded-full font-medium transition-all duration-300 hover:shadow-md">
                    {{ $category->name }}
                </button>
            @endforeach


        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach ($services as $service)
                <x-main.service-card :tenant="$tenants->slug" :data="$service"></x-main.service-card>
            @endforeach



        </div>





    </section>
</div>
