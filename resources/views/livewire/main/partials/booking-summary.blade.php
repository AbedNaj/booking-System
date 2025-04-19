<div>


    <div class="mb-8 bg-blue-50 rounded-xl p-6" x-show="selectedTime" x-cloak>
        <h3 class="text-xl font-bold mb-4 text-blue-800">{{ __('tenant-service.bookingSummary') }} </h3>



        <div class="flex items-center justify-between border-b border-blue-200 pb-4 mb-4">
            <div class="flex items-center">
                <div class="bg-blue-200 p-2 rounded-lg ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <p class="text-blue-800 font-medium">{{ __('tenant-service.dateandTime') }} </p>
                    <p class="text-blue-600">
                        <span x-text="selectedDate"></span> - <span x-text="selectedTime"> </span> - <span
                            x-text="endTime">
                    </p>
                </div>
            </div>
        </div>



        <div class="flex items-center justify-between border-b border-blue-200 pb-4 mb-4">
            <div class="flex items-center">
                <div class="bg-blue-200 p-2 rounded-lg ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-blue-800 font-medium">{{ __('tenant-service.serviceDuration') }} </p>
                    <p class="text-blue-600">{{ $service->duration_minutes }} {{ __('tenant-service.minute') }}</p>
                </div>
            </div>
        </div>



        <div class="flex items-center justify-between border-b border-blue-200 pb-4 mb-4">
            <div class="flex items-center">
                <div class="bg-blue-200 p-2 rounded-lg ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <p class="text-blue-800 font-medium">{{ __('tenant-service.selectedEmployee') }}</p>
                    <p class="text-blue-600" x-text="selectedEmployeeName"></p>
                </div>
            </div>
        </div>



        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="bg-blue-200 p-2 rounded-lg ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-blue-800 font-medium">{{ __('tenant-service.totalPrice') }}</p>
                    <p class="text-blue-600 font-bold">{{ $service->price }}</p>
                </div>
            </div>
        </div>
    </div>


</div>