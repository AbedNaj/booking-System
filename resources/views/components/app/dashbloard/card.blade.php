      <div
          class="bg-white dark:bg-zinc-800 rounded-2xl shadow-sm p-6 border border-gray-200 dark:border-zinc-700 relative overflow-hidden">
          <div
              class="absolute right-0 top-0 w-16 h-16 bg-indigo-100 dark:bg-indigo-900/20 rounded-bl-3xl flex items-center justify-center">

              {{ $icon }}
          </div>
          <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">{{ __('dashboard.total_bookings') }}</p>
          <p class="text-3xl font-bold text-gray-900 dark:text-white tracking-tight">248</p>
          <div class="flex items-center mt-2 text-xs">
              <span class="flex items-center text-emerald-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 10l7-7m0 0l7 7m-7-7v18" />
                  </svg>
                  12.5%
              </span>
              <span class="text-gray-400 dark:text-gray-500 ml-1">vs last week</span>
          </div>
      </div>
