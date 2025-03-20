<header class="flex flex-wrap justify-between items-center p-6 bg-white sticky top-0 z-50 shadow-md backdrop-blur-sm bg-opacity-90">
    <div class="flex items-center gap-2">
        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
        <h1 class="text-2xl font-bold gradient-text">BookSite</h1>
    </div>
    <nav class="hidden md:block">
        <ul class="flex items-center gap-8">
            <li><a href="#features" class="hover:text-blue-500 transition-colors">المميزات</a></li>
            <li><a href="#pricing" class="hover:text-blue-500 transition-colors">الأسعار</a></li>
            <li><a href="#testimonials" class="hover:text-blue-500 transition-colors">آراء العملاء</a></li>
            <li><a href="#contact" class="hover:text-blue-500 transition-colors">تواصل معنا</a></li>
            <li><a href="/app/login" class="bg-blue-500 text-white py-2 px-6 rounded-full hover:bg-blue-600 transition-all transform hover:scale-105"> {{ __('header.login') }}</a>
            </li>
        </ul>
    </nav>
    <button class="md:hidden text-gray-500 hover:text-gray-700">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
</header>