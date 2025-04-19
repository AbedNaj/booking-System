<div>

  <section x-data="{ selectedTime: null
   , endTime:null,
    selectedEmployee: '' 
    , selectedEmployeeName:''
     , selectedDateID:'' , selectedDate:'' , 'date': null
      , showConfirmation: false }" class="max-w-4xl mx-auto p-4 md:p-8 bg-white rounded-3xl shadow-lg my-8 fade-in">
   
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
         @click="selectedDateID = {{ $day['id'] }} , selectedDate= '{{ $day['day_name'] }} {{ $day['day_number'] }} {{ $day['month_name'] }}' , date = '{{ $day['full_date'] }}'"
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
  <button @click="selectedTime = '{{ $time['start_time'] }}'; endTime = '{{ $time['end_time'] }}'" 
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



@include('livewire.main.partials.booking-summary')



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
    
 

@include('livewire.main.partials.booking-confirm')


</section>