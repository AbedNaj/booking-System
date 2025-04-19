<div>

    @if (Auth::guard('customer')->check())


            <div x-show="showConfirmation" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                x-cloak>
                <div class="bg-white rounded-2xl p-6 max-w-md w-full mx-4 relative">


                    <button @click="showConfirmation = false" class="absolute top-4 left-4 text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>



                    <div class="text-center mb-6">
                        <div class="mx-auto bg-green-100 w-16 h-16 flex items-center justify-center rounded-full mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">{{ __('tenant-service.BookingConfirm') }} </h3>

                    </div>

                    <div class="bg-gray-50 p-4 rounded-xl mb-6">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-500">{{ __('tenant-service.service') }}:</span>
                            <span class="font-medium">{{ $service->name }}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-500">{{ __('tenant-service.date') }}:</span>
                            <span class="font-medium" x-text="selectedDate"> </span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-500">{{ __('tenant-service.time') }}:</span>
                            <div>
                                <span class="font-medium" x-text="selectedTime"></span> - <span x-text="endTime"> </span>
                            </div>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-500">{{ __('tenant-service.employee') }}:</span>
                            <span class="font-medium" x-text="selectedEmployeeName"> </span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-500">{{ __('tenant-service.serviceDuration') }}:</span>
                            <span class="font-medium">{{ $service->duration_minutes }}</span>
                        </div>
                        <div class="flex justify-between pt-2 border-t border-gray-200 mt-2">
                            <span class="text-gray-700 font-medium">{{ __('tenant-service.totalPrice') }}:</span>
                            <span class="font-bold text-green-600">${{ $service->price }}</span>
                        </div>
                    </div>


                    <div class="flex items-center mt-4 mb-6">
                        <input type="checkbox" id="terms"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded ml-2">
                        <label for="terms" class="text-sm text-gray-600">أوافق على <a href="#"
                                class="text-blue-600 hover:underline">الشروط والأحكام</a></label>
                    </div>

                    <div class="flex gap-3">
                        <button @click="showConfirmation = false"
                            class="flex-1 py-3 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg transition">
                            {{ __('tenant-service.cancel') }}
                        </button>



                        <button @click="$wire.bookingConfirm( selectedEmployee , date , selectedTime , endTime)"
                            class="flex-1 py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition flex items-center justify-center font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            {{ __('tenant-service.confirm') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 p-3 flex justify-around">
            <a href="#" class="flex flex-col items-center text-gray-500 hover:text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="text-xs mt-1">الرئيسية</span>
            </a>
            <a href="#" class="flex flex-col items-center text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="text-xs mt-1">الحجوزات</span>
            </a>
            <a href="#" class="flex flex-col items-center text-gray-500 hover:text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="text-xs mt-1">حسابي</span>
            </a>
        </div>
        </div>
    @else
        <div x-show="showConfirmation" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
            x-cloak>
            <div class="bg-white rounded-2xl p-6 max-w-md w-full mx-4 relative">
                <button @click="showConfirmation = false" class="absolute top-4 left-4 text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="text-center mb-6">
                    <div class="mx-auto bg-yellow-100 w-16 h-16 flex items-center justify-center rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m0 0v2m0-2h2m-2 0H9.5m11 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-2">{{ __('tenant-service.loginRequired') }}</h3>
                </div>

                <div class="bg-gray-50 p-4 rounded-xl mb-6">
                    <p class="text-gray-700 text-center">
                        {{ __('tenant-service.loginRequiredMessage') }}
                    </p>
                </div>

                <div class="flex gap-3">
                    <button @click="showConfirmation = false"
                        class="flex-1 py-3 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg transition">
                        {{ __('tenant-service.cancel') }}
                    </button>
                    <a href="{{ route('customer.login', ['tenants' => $tenants]) }}"
                        class="flex-1 py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition flex items-center justify-center font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        {{ __('tenant-service.loginNow') }}
                    </a>
                </div>
            </div>
        </div>
        </div>
    @endif
</div>