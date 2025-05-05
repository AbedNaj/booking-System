<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Account | Dashboard</title>

    <meta name="description" content="Employee management dashboard with booking system">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 dark:bg-zinc-900 text-gray-800 dark:text-gray-200 min-h-screen flex flex-col">

    <nav class="bg-white dark:bg-zinc-800 shadow-sm border-b border-gray-200 dark:border-zinc-700 sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">


                <div class="flex items-center flex-1">
                    <div class="flex-shrink-0"></div>
                    <div class="ml-2 text-xl font-bold text-gray-900 dark:text-white">
                        Employee
                    </div>
                </div>


                <div class="hidden md:block flex-1 text-center">
                    <flux:navbar class="inline-flex space-x-2 justify-center">
                        <flux:navbar.item href="{{ route('app.employee.dashboard') }}" icon="home">
                            {{ __('employees.dashboard') }}
                        </flux:navbar.item>

                        <flux:navbar.item :current="request() -> is('app/employee/bookings*')"
                            href="{{ route('app.employee.bookings') }}" icon="calendar">
                            {{ __('employees.bookings') }}
                        </flux:navbar.item>

                        <flux:navbar.item href="{{ route('app.employee.account') }}" icon="currency-dollar">{{ __('employees.account') }}
                        </flux:navbar.item>
                    </flux:navbar>
                </div>

                <div class="flex items-center justify-end flex-1">
                    @livewire('app.employee-account.user-drop')
                </div>


                <div class="md:hidden">
                    <button
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-zinc-700 focus:outline-none">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>




    <main class="flex-grow py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>




</body>

</html>
