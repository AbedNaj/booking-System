<div>
    <div>

        <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md border border-gray-200">
                <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">{{ __('employees.employeeLogin') }}</h2>
                @if (session()->has('success'))
                    <x-app.alert type="success" :message="session('success')" />


                @endif

                @if (session()->has('error'))
                    <x-app.alert type="error" :message="session('error')" />
                @endif
                <form wire:submit.prevent="login" x-data="{ loading: false, showPassword: false }">
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2 font-medium">{{ __('employees.email') }}</label>
                        <div class="relative">
                            <input wire:model.defer='email' name="email" type="email"
                                class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="example@email.com" required>
                            <span class="absolute right-3 top-3 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="mb-6">

                        <div class="relative">
                            <label class="block text-gray-700 mb-2 font-medium">{{ __('employees.password') }}</label>
                            <input wire:model.defer='password' :type="showPassword ? 'text' : 'password'"
                                class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="********" required>

                            <button type="button" @click="showPassword = !showPassword"
                                class="absolute right-3 top-3 text-gray-400">
                                <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd"
                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                    viewBox="0 0 20 20" fill="currentColor" style="display: none;">
                                    <path fill-rule="evenodd"
                                        d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="flex items-center">
                            <input type="checkbox"
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <span class="ml-2 text-gray-700">Remember me</span>
                        </label>
                    </div>

                    <x-main.auth.button target="login">Login</x-main.auth.button>


                </form>
            </div>
        </div>
    </div>
</div>