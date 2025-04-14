<header
    class="bg-white shadow-md py-4 px-6 flex flex-col md:flex-row justify-between items-center gap-4 md:gap-0 sticky top-0 z-50 border-b border-gray-100 ltr">

    <div class="flex items-center gap-3">
        <div class="relative overflow-hidden rounded-full w-12 h-12 shadow-sm border border-gray-100">
            <img src="/images/logo.png" alt="Logo" class="w-full h-full object-cover">
        </div>
        <div>
            <a href="{{ route('tenant.service.list', ['tenants' => request()->segment('1')]) }}">
                <h1 class="text-xl font-bold text-gray-800">{{ request()->segment('1') }}</h1>
            </a>
        </div>
    </div>

    <nav class="flex items-center gap-4 sm:gap-6">


        <a href="#"
            class="text-gray-600 hover:text-gray-900 transition-colors font-medium text-sm sm:text-base flex items-center gap-1">
            <span>Services</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </a>
        <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors font-medium text-sm sm:text-base">Book
            Now</a>

        @unless (Auth::guard('customer')->check())
            <a href="{{ route('customer.login', ['tenants' => request()->segment(1)]) }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors font-medium text-sm sm:text-base shadow-sm hover:shadow flex items-center gap-1">
                <span>Login</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
            </a>
        @else

            @livewire('main.header-profile-menu', ['customer' => Auth::guard('customer')->user()])

        @endunless


    </nav>
</header>