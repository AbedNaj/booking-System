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
                الكل
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


        <div class="mt-12 text-center">
            <button
                class="inline-flex items-center bg-white border border-blue-600 text-blue-600 hover:bg-blue-50 font-medium rounded-lg px-8 py-3 transition-all duration-300">
                عرض المزيد من الخدمات
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
        </div>

        <div class="mt-24">
            <h2 class="text-3xl font-bold text-center mb-12">لماذا تختار خدماتنا؟</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md flex flex-col items-center text-center">
                    <div class="bg-blue-100 p-3 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">جودة عالية</h3>
                    <p class="text-gray-600">نستخدم فقط منتجات ذات جودة عالية وأدوات معقمة لضمان أفضل النتائج والحفاظ
                        على صحتك.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md flex flex-col items-center text-center">
                    <div class="bg-blue-100 p-3 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">سرعة في الخدمة</h3>
                    <p class="text-gray-600">فريقنا محترف ومدرب على تقديم الخدمات بكفاءة وسرعة دون المساس بالجودة.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md flex flex-col items-center text-center">
                    <div class="bg-blue-100 p-3 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">أسعار منافسة</h3>
                    <p class="text-gray-600">نقدم أسعاراً مناسبة مع عروض وخصومات مستمرة لنضمن لك قيمة مقابل كل شيكل
                        تدفعه.</p>
                </div>
            </div>
        </div>
    </section>
</div>
