<div>
    <header
        class="bg-white shadow-md py-4 px-6 flex flex-col md:flex-row justify-between items-center gap-4 md:gap-0 sticky top-0 z-50 border-b border-gray-100 ltr">

        <div class="flex items-center gap-3">
            <div class="relative overflow-hidden rounded-full w-12 h-12 shadow-sm border border-gray-100">
                <img src="{{ $logoURL ? Storage::disk('do')->url($logoURL) : asset('images/Default_pfp.jpg') }}"
                    alt="Logo" class="w-full h-full object-cover">
            </div>
            <div>
                <a wire:navigate href="{{ route('tenant.home', ['tenants' => request()->segment('1')]) }}">
                    <h1 class="text-xl font-bold text-gray-800">{{ request()->segment('1') }}</h1>
                </a>
            </div>
        </div>

        <nav class="flex items-center gap-4 sm:gap-6">


            <a wire:navigate href="{{ route('tenant.service.list', ['tenants' => request()->segment('1')]) }}"
                class="text-gray-600 hover:text-gray-900 transition-colors font-medium text-sm sm:text-base flex items-center gap-1">
                <span>Services</span>

            </a>






            @livewire('main.header-profile-menu', ['customer' => Auth::guard('customer')->user()])




        </nav>
    </header>
</div>
