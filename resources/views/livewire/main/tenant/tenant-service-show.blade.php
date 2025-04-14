<div>

  <section x-data="{ selectedTime: null, selectedEmployee: '' , selectedEmployeeName:'' , selectedDateID:'' , selectedDate:''  , showConfirmation: false }" class="max-w-4xl mx-auto p-4 md:p-8 bg-white rounded-3xl shadow-lg my-8 fade-in">
   
    <div class="mb-6 flex justify-between items-center">
      <h1 class="text-2xl md:text-4xl font-bold text-gray-800">حجز <span class="text-blue-600">خدمة جديدة</span></h1>
      <div class="flex items-center space-x-reverse space-x-2">
        <span class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full font-medium">متاح الآن</span>
      </div>
    </div>
    
    <div class="mb-8 relative overflow-hidden rounded-2xl shadow-lg service-card">
      <img src="{{ $service->image ? Storage::disk('do')->url($service->image) : ''}}" alt="{{ $service->name }} alt="صورة الخدمة" class="w-full h-64 md:h-80 object-cover">
      <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
        <h2 class="text-3xl font-bold text-white">{{ $service->name }}</h2>
       
      </div>
    </div>


    <div class="mb-8 bg-gray-50 p-6 rounded-2xl">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
  
      <x-main.service-status-card title="{{ __('tenant-service.serviceDuration') }}">
      <x-slot:icon>
             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
      </x-slot:icon>
      {{ $service->duration_minutes }} {{ __('tenant-service.minute') }}
      </x-main.service-status-card>


      <x-main.service-status-card title="{{ __('tenant-service.minute') }}">
      <x-slot:icon>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
      </x-slot:icon>
   {{ $service->price }} 
      </x-main.service-status-card>


      <x-main.service-status-card title="{{ __('tenant-service.status') }}">
      <x-slot:icon>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
      </x-slot:icon>
  {{ $service->status }}
      </x-main.service-status-card>





      

    </div>


      <div class="mt-6">
        <h3 class="text-xl font-bold mb-3">{{ __('tenant-service.serviceDescription') }}</h3>
        <p class="text-gray-700 leading-relaxed">
        
          {{ $service->description }}    
      </div>




<div class="my-8">
  <h3 class="text-xl  font-bold mb-4">{{ __('tenant-service.pickEmployee') }}</h3>
  <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

  @foreach ($employees as $employee)
    <x-main.employee-card :data="$employee"></x-main.employee-card>

  
  @endforeach
  @if($employees->isEmpty())
  <p class="mb-4 text-gray-400">no avaiable employees</p>
  @endif
    
  </div>




    <div class="mb-8">
      <h3 class="text-xl font-bold mb-4">{{ __('tenant-service.pickdate') }}</h3>
      <div class="flex overflow-x-auto py-2 px-2  space-x-2">
      @foreach ($datesToShow as $day)

         <div
         @click="selectedDateID = {{ $day['id'] }} , selectedDate= '{{ $day['day_name'] }} {{ $day['day_number'] }} {{ $day['month_name'] }}' "
         wire:click='getAvailableTimes({{ $day['id'] }})'
         :class="{'ring-2 ring-blue-500 bg-blue-50 text-blue-700': selectedDateID === {{ $day['id'] }}, 'bg-green-100 text-green-700': selectedDateID !== {{ $day['id'] }}}"
          class="flex-shrink-0 bg-white border border-gray-200 rounded-xl p-3 w-24 text-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition">
          <p class="text-sm text-gray-500">{{ $day['day_name'] }}</p>
          <p class="font-bold text-lg">{{   $day['day_number']   }}</p>
          <p class="text-xs text-gray-500">{{ $day['month_name'] }}</p>
        </div>

      @endforeach
 
    </div>

@if ($timeslots)
      <div   class="mb-8">
      <h3 class="text-xl font-bold mb-4">{{ __('tenant-service.pickTime') }}</h3>
      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
    
@foreach ($timeslots as $time)
  <button @click="selectedTime = '{{ $time['start_time'] }}'" 
          :class="{
              'ring-2 ring-blue-500 bg-blue-50 text-blue-700': selectedTime === '{{ $time['start_time'] }}',
              'bg-green-100 text-green-700': selectedTime !== '{{ $time['start_time'] }}'
          }"
          class="time-slot px-4 py-3 rounded-xl hover:bg-blue-100 transition text-center font-medium">
    <div class="flex items-center justify-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      {{ $time['start_time'] }}
    </div>
  </button>
@endforeach

@else
  <div class="col-span-4 mt-2 text-center">
    <p class="text-gray-500">{{ __('tenant-service.selectdate') }}</p>
  </div>
@endif

      </div>
           </div>
<!--

        <span class="px-4 py-3 bg-gray-100 text-gray-400 rounded-xl cursor-not-allowed text-center font-medium">
          <div class="flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            12:00 مساءً
          </div>
        </span>


      </div>
    </div>
    -->

    
   
    <div class="mb-8 bg-blue-50 rounded-xl p-6" x-show="selectedTime" x-cloak>
      <h3 class="text-xl font-bold mb-4 text-blue-800">{{ __('tenant-service.bookingSummary') }} </h3>



      <div class="flex items-center justify-between border-b border-blue-200 pb-4 mb-4">
        <div class="flex items-center">
          <div class="bg-blue-200 p-2 rounded-lg ml-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </div>
          <div>
            <p class="text-blue-800 font-medium">{{ __('tenant-service.dateandTime') }} </p>
      <p class="text-blue-600">
  <span x-text="selectedDate"></span> - <span x-text="selectedTime"></span>
</p>
          </div>
        </div>
      </div>



      <div class="flex items-center justify-between border-b border-blue-200 pb-4 mb-4">
        <div class="flex items-center">
          <div class="bg-blue-200 p-2 rounded-lg ml-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
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
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
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
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div>
            <p class="text-blue-800 font-medium">{{ __('tenant-service.totalPrice') }}</p>
            <p class="text-blue-600 font-bold">{{ $service->price }}</p>
          </div>
        </div>
      </div>
    </div>







    <div class="mt-8">
      <button @click="showConfirmation = true" 
             :class="{
  'bg-blue-600 hover:bg-blue-700': selectedTime && selectedEmployeeName,
  'bg-gray-400 cursor-not-allowed': !(selectedTime && selectedEmployeeName)
}"
              class="w-full py-4 rounded-xl text-lg font-bold text-white transition flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      {{ __('tenant-service.BookingConfirm') }}
      </button>
    </div>
    
 




@if (Auth::guard('customer')->check())
  



    <div x-show="showConfirmation" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" x-cloak>
      <div class="bg-white rounded-2xl p-6 max-w-md w-full mx-4 relative">


        <button @click="showConfirmation = false" class="absolute top-4 left-4 text-gray-500 hover:text-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>



        <div class="text-center mb-6">
          <div class="mx-auto bg-green-100 w-16 h-16 flex items-center justify-center rounded-full mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
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
            <span class="font-medium" x-text="selectedDate">  </span>
          </div>
          <div class="flex justify-between mb-2">
            <span class="text-gray-500">{{ __('tenant-service.time') }}:</span>
            <span class="font-medium" x-text="selectedTime"></span>
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
          <input type="checkbox" id="terms" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded ml-2">
          <label for="terms" class="text-sm text-gray-600">أوافق على <a href="#" class="text-blue-600 hover:underline">الشروط والأحكام</a></label>
        </div>
        
        <div class="flex gap-3">
          <button @click="showConfirmation = false" class="flex-1 py-3 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg transition">
            {{ __('tenant-service.cancel') }}
          </button>
          <button class="flex-1 py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition flex items-center justify-center font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
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
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
      </svg>
      <span class="text-xs mt-1">الرئيسية</span>
    </a>
    <a href="#" class="flex flex-col items-center text-blue-600">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
      </svg>
      <span class="text-xs mt-1">الحجوزات</span>
    </a>
    <a href="#" class="flex flex-col items-center text-gray-500 hover:text-blue-600">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
      </svg>
      <span class="text-xs mt-1">حسابي</span>
    </a>
  </div>
</div>
@else
    <div x-show="showConfirmation" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" x-cloak>
      <div class="bg-white rounded-2xl p-6 max-w-md w-full mx-4 relative">
        <button @click="showConfirmation = false" class="absolute top-4 left-4 text-gray-500 hover:text-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>

        <div class="text-center mb-6">
          <div class="mx-auto bg-yellow-100 w-16 h-16 flex items-center justify-center rounded-full mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m0 0v2m0-2h2m-2 0H9.5m11 0a9 9 0 11-18 0 9 9 0 0118 0z" />
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
          <button @click="showConfirmation = false" class="flex-1 py-3 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg transition">
               {{ __('tenant-service.cancel') }}
          </button>
          <a href="{{ route('customer.login' , ['tenants'=> $tenants]) }}" class="flex-1 py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition flex items-center justify-center font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
            </svg>
          {{ __('tenant-service.loginNow') }}
          </a>
        </div>
      </div>
    </div>
  </div>
@endif

</section>