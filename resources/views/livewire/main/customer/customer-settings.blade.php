<div>
    <div class="min-h-screen">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Account Settings</h1>

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">

                <div class="md:flex">
                    <div class="md:w-1/4 border-b md:border-b-0 md:border-r dark:border-gray-700">
                        <nav class="py-4">
                            <ul>
                                <li>
                                    <a href="#password"
                                        class="block px-6 py-3 text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-gray-700 border-l-4 border-blue-600 dark:border-blue-400">
                                        <i class="fas fa-lock mr-2"></i>
                                        Password
                                    </a>
                                </li>
                                <li>
                                    <a href="#language"
                                        class="block px-6 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <i class="fas fa-language mr-2"></i>
                                        Language
                                    </a>
                                </li>
                                <li>
                                    <a href="#appearance"
                                        class="block px-6 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <i class="fas fa-paint-brush mr-2"></i>
                                        Appearance
                                    </a>
                                </li>
                                <li>
                                    <a href="#delete"
                                        class="block px-6 py-3 text-red-600 dark:text-red-400 hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <i class="fas fa-trash-alt mr-2"></i>
                                        Delete Account
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>


                    <div class="md:w-3/4 p-6">

                        @if (session()->has('message'))
                            <div
                                class="bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 p-4 rounded mb-6 flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                {{ session('message') }}
                            </div>
                        @endif


                        <div id="password" class="mb-8">
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Change Password</h2>

                            <form wire:submit.prevent="updatePassword" class="space-y-4">
                                <div>
                                    <label for="currentPassword"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Current
                                        Password</label>
                                    <input type="password" id="currentPassword" wire:model="currentPassword"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                        required>
                                    @error('currentPassword') <span
                                    class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="newPassword"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">New
                                        Password</label>
                                    <input type="password" id="newPassword" wire:model="newPassword"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                        required>
                                    @error('newPassword') <span
                                    class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="newPassword_confirmation"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Confirm
                                        New Password</label>
                                    <input type="password" id="newPassword_confirmation"
                                        wire:model="newPassword_confirmation"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                        required>
                                    @error('passwordConfirmation') <span
                                    class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <button type="submit"
                                        class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                        Update Password
                                    </button>
                                </div>
                            </form>
                        </div>


                        <div id="language" class="mb-8">
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Preferred Language
                            </h2>
                            <div class="flex flex-wrap gap-3">
                                <button wire:click="setLanguage('en')"
                                    class="px-4 py-2 rounded-md flex items-center {{ $language === 'en' ? 'bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300' }}">
                                    <span class="mr-2">🇺🇸</span>
                                    English
                                </button>
                                <button wire:click="setLanguage('ar')"
                                    class="px-4 py-2 rounded-md flex items-center {{ $language === 'ar' ? 'bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300' }}">
                                    <span class="mr-2">🇸🇦</span>
                                    Arabic
                                </button>
                                <button wire:click="setLanguage('fr')"
                                    class="px-4 py-2 rounded-md flex items-center {{ $language === 'fr' ? 'bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300' }}">
                                    <span class="mr-2">🇫🇷</span>
                                    Français
                                </button>
                            </div>
                        </div>

                        <div id="appearance" class="mb-8"
                            x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }">
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Appearance</h2>
                            <div class="flex items-center">
                                <span class="text-gray-700 dark:text-gray-300 mr-3">
                                    <i class="fas fa-sun"></i>
                                    Light Mode
                                </span>
                                <button
                                    @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode); $dispatch('toggle-dark-mode', { darkMode })"
                                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none"
                                    :class="darkMode ? 'bg-blue-600' : 'bg-gray-200'">
                                    <span
                                        class="pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
                                        :class="darkMode ? 'translate-x-5' : 'translate-x-0'"></span>
                                </button>
                                <span class="text-gray-700 dark:text-gray-300 ml-3">
                                    <i class="fas fa-moon"></i>
                                    Dark Mode
                                </span>
                            </div>
                        </div>


                        <div id="delete" class="mb-8" x-data="{ showConfirmation: false }">
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Delete Account</h2>
                            <div
                                class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-900 rounded-md p-4 mb-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-exclamation-triangle text-red-600 dark:text-red-400"></i>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-red-800 dark:text-red-400">Warning</h3>
                                        <div class="mt-2 text-sm text-red-700 dark:text-red-300">
                                            <p>Deleting your account will permanently remove all your data. This action
                                                cannot be undone.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div x-show="!showConfirmation">
                                <button @click="showConfirmation = true"
                                    class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                    Delete Account
                                </button>
                            </div>

                            <div x-show="showConfirmation"
                                class="bg-white dark:bg-gray-800 border dark:border-gray-700 rounded-md p-4">
                                <p class="text-gray-700 dark:text-gray-300 mb-4">Are you sure you want to delete your
                                    account? You won't be able to recover it later.</p>
                                <div class="flex space-x-3">
                                    <button wire:click="deleteAccount"
                                        class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                        Yes, Delete Account
                                    </button>
                                    <button @click="showConfirmation = false"
                                        class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>

        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark');
        }


        window.addEventListener('toggle-dark-mode', event => {
            if (event.detail.darkMode) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        });
    </script>
</div>