@extends('layouts.app')

@section('content')

<section class="hero-bg text-center py-32 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-20"></div>
    <div class="container mx-auto px-4 relative z-10">
        <h2 class="text-6xl font-extrabold mb-6 leading-tight">نظام حجز ذكي<br>لمستقبل أعمالك</h2>
        <p class="text-2xl mb-8 text-gray-100 max-w-2xl mx-auto">أنشئ صفحة حجز احترافية خلال دقائق وأدر أعمالك بكفاءة عالية!</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('register') }}" class="bg-white text-blue-600 py-3 px-8 rounded-full font-bold hover:bg-blue-50 transition transform hover:scale-105 inline-flex items-center gap-2">
                ابدأ الآن مجانًا
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
            <a href="#features" class="bg-transparent border-2 border-white text-white py-3 px-8 rounded-full font-bold hover:bg-white hover:text-blue-600 transition">تعرف على المزيد</a>
        </div>
    </div>
</section>

<section id="features" class="py-24 container mx-auto px-4">
    <div class="text-center mb-16">
        <h3 class="text-4xl font-bold mb-4 gradient-text">مميزات متقدمة</h3>
        <p class="text-gray-600 max-w-2xl mx-auto">نقدم لك مجموعة متكاملة من الأدوات لإدارة حجوزاتك بكفاءة عالية</p>
    </div>
    <div class="grid md:grid-cols-4 sm:grid-cols-2 gap-8">
        <div class="feature-card p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h4 class="text-xl font-bold mb-3">إدارة مرنة</h4>
            <p class="text-gray-600">تحكم كامل في جدولة مواعيدك وخدماتك بسهولة تامة</p>
        </div>
        <div class="feature-card p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                </svg>
            </div>
            <h4 class="text-xl font-bold mb-3">رابط مخصص</h4>
            <p class="text-gray-600">صفحة حجز فريدة تعكس هوية مشروعك</p>
        </div>
        <div class="feature-card p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl">
            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
            </div>
            <h4 class="text-xl font-bold mb-3">إشعارات فورية</h4>
            <p class="text-gray-600">تنبيهات لحظية لكل حجز جديد عبر البريد والجوال</p>
        </div>
        <div class="feature-card p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl">
            <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
            </div>
            <h4 class="text-xl font-bold mb-3">تقارير ذكية</h4>
            <p class="text-gray-600">تحليلات متقدمة وتقارير تفصيلية لنمو أعمالك</p>
        </div>
    </div>
</section>

<section id="pricing" class="py-24 bg-gradient-to-b from-gray-50 to-gray-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h3 class="text-4xl font-bold mb-4 gradient-text">خطط مرنة تناسب احتياجاتك</h3>
            <p class="text-gray-600 max-w-2xl mx-auto">اختر الخطة المناسبة لحجم مشروعك</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <div class="pricing-card bg-white p-8 rounded-3xl shadow-lg text-center">
                <div class="mb-8">
                    <h4 class="text-2xl font-bold mb-2">مجانية</h4>
                    <p class="text-gray-600 mb-6">ابدأ مجانًا مع الميزات الأساسية</p>
                    <div class="text-5xl font-bold mb-2">$0</div>
                    <p class="text-gray-500">شهرياً</p>
                </div>
                <ul class="text-right mb-8 space-y-4">
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        حتى 20 حجز شهرياً
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        صفحة حجز أساسية
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        إشعارات بريدية
                    </li>
                </ul>
                <a href="/register" class="block w-full py-3 px-6 bg-gray-100 text-gray-800 rounded-full hover:bg-gray-200 transition">ابدأ الآن</a>
            </div>
            <div class="pricing-card bg-white p-8 rounded-3xl shadow-xl scale-105 border-2 border-blue-500">
                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    <span class="bg-blue-500 text-white px-4 py-1 rounded-full text-sm">الأكثر شعبية</span>
                </div>
                <div class="mb-8">
                    <h4 class="text-2xl font-bold mb-2">أساسية</h4>
                    <p class="text-gray-600 mb-6">لأصحاب المشاريع المتوسطة</p>
                    <div class="text-5xl font-bold mb-2 gradient-text">$29</div>
                    <p class="text-gray-500">شهرياً</p>
                </div>
                <ul class="text-right mb-8 space-y-4">
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        حجوزات غير محدودة
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        صفحة حجز مخصصة
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        إشعارات متقدمة
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        تقارير أساسية
                    </li>
                </ul>
                <a href="/register" class="block w-full py-3 px-6 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition transform hover:scale-105">اشترك الآن</a>
            </div>
            <div class="pricing-card bg-white p-8 rounded-3xl shadow-lg text-center">
                <div class="mb-8">
                    <h4 class="text-2xl font-bold mb-2">احترافية</h4>
                    <p class="text-gray-600 mb-6">للمشاريع الكبيرة والشركات</p>
                    <div class="text-5xl font-bold mb-2">$79</div>
                    <p class="text-gray-500">شهرياً</p>
                </div>
                <ul class="text-right mb-8 space-y-4">
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        كل مميزات الخطة الأساسية
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        تحليلات متقدمة
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        دعم فني متميز
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        API مخصص
                    </li>
                </ul>
                <a href="/register" class="block w-full py-3 px-6 bg-gray-800 text-white rounded-full hover:bg-gray-900 transition">اتصل بنا</a>
            </div>
        </div>
    </div>
</section>


<section id="testimonials" class="py-24 container mx-auto px-4">
    <div class="text-center mb-16">
        <h3 class="text-4xl font-bold mb-4 gradient-text">ماذا يقول عملاؤنا</h3>
        <p class="text-gray-600 max-w-2xl mx-auto">تجارب حقيقية من مستخدمي النظام</p>
    </div>
    <div class="grid md:grid-cols-3 gap-8">
        <div class="testimonial-card bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition">
            <div class="flex items-center gap-4 mb-6">
                <img src="https://source.unsplash.com/100x100/?portrait" alt="صورة العميل" class="w-16 h-16 rounded-full object-cover">
                <div>
                    <h4 class="font-bold">د. سامي الأحمد</h4>
                    <p class="text-gray-600">عيادة طب الأسنان</p>
                </div>
            </div>
            <p class="text-gray-700 leading-relaxed">"نظام رائع ساعدني في تنظيم مواعيد العيادة بشكل احترافي. الإشعارات التلقائية قللت نسبة التخلف عن المواعيد بشكل ملحوظ!"</p>
        </div>
        <div class="testimonial-card bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition">
            <div class="flex items-center gap-4 mb-6">
                <img src="https://source.unsplash.com/101x101/?portrait" alt="صورة العميل" class="w-16 h-16 rounded-full object-cover">
                <div>
                    <h4 class="font-bold">ريم السالم</h4>
                    <p class="text-gray-600">صالون التجميل</p>
                </div>
            </div>
            <p class="text-gray-700 leading-relaxed">"سهولة الاستخدام والتصميم الجذاب لصفحة الحجز ساعد في زيادة الحجوزات. أنصح به بشدة لكل صالونات التجميل!"</p>
        </div>
        <div class="testimonial-card bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition">
            <div class="flex items-center gap-4 mb-6">
                <img src="https://source.unsplash.com/102x102/?portrait" alt="صورة العميل" class="w-16 h-16 rounded-full object-cover">
                <div>
                    <h4 class="font-bold">أحمد العلي</h4>
                    <p class="text-gray-600">مدرب شخصي</p>
                </div>
            </div>
            <p class="text-gray-700 leading-relaxed">"التقارير والإحصائيات ساعدتني في فهم نمط الحجوزات وتحسين جدولي. الدعم الفني ممتاز والتحديثات المستمرة رائعة!"</p>
        </div>
    </div>
</section>

<section class="py-16 bg-blue-500 text-white">
    <div class="container mx-auto px-4 text-center">
        <h3 class="text-3xl font-bold mb-4">جاهز لتطوير أعمالك؟</h3>
        <p class="mb-8 text-xl">ابدأ الآن واحصل على 14 يوم تجربة مجانية</p>
        <a href="/register" class="bg-white text-blue-600 py-3 px-8 rounded-full font-bold hover:bg-blue-50 transition transform hover:scale-105 inline-flex items-center gap-2">
            ابدأ التجربة المجانية
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
        </a>
    </div>
</section>
@endsection