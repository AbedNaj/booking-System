<div>
    <div>
        <div class="bg-white dark:bg-zinc-800 shadow rounded-lg">

            <div class="px-6 py-4 border-b border-gray-200 dark:border-zinc-700">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Employee Profile</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Update your personal information and work
                    schedule</p>
            </div>

            <div x-cloak x-data="{ show: false, message: '', type: '' }"
                @notify.window="
        show = true; 
        message = $event.detail[0].message;
        type = $event.detail[0].type;
        setTimeout(() => { show = false }, 2000)
     ">
                <div x-show="show" x-transition>
                    <div class="px-4 py-2">
                        <div :class="{
                            'bg-green-500': type === 'success',
                            'bg-red-500': type === 'error',
                            'bg-yellow-500': type === 'warning',
                            'bg-blue-500': type === 'info'
                        }"
                            class="text-white rounded-lg shadow-lg p-4">
                            <span x-text="message"></span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="p-6 space-y-8">
                <div class="flex flex-col md:flex-row gap-8">

                    <div class="flex flex-col items-center space-y-4" x-data="{
                        preview: null,
                        loadPreview(event) {
                            const file = event.target.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = e => this.preview = e.target.result;
                                reader.readAsDataURL(file);
                            }
                        },
                        removePreview() {
                            this.preview = null;
                        }
                    }">
                        <div class="relative group">
                            <div
                                class="w-32 h-32 rounded-full overflow-hidden bg-gray-200 dark:bg-zinc-700 border-4 border-white dark:border-zinc-600 shadow">
                                <img id="profileImage"
                                    :src="preview ? preview :
                                        '{{ $image ? $image : asset('images/Default_pfp.jpg') }}'"
                                    alt="Profile Image" class="w-full h-full object-cover">
                            </div>

                            <div x-cloak>
                                <label for="imageUpload"
                                    class="absolute inset-0 flex items-center justify-center rounded-full bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 cursor-pointer transition-opacity duration-200">
                                    <span class="text-white text-sm font-medium">Change Photo</span>
                                </label>
                                <input wire:model.defer='image' type="file" @change="loadPreview" id="imageUpload"
                                    class="hidden" accept="image/*">

                            </div>

                        </div>

                    </div>


                    <div class="flex-1 space-y-6">
                        <div class="space-y-4">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Personal Information</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">


                                <div>
                                    <label for="name"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Full
                                        Name</label>
                                    <input type="text" wire:model.defer = "name"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-zinc-600 rounded-md shadow-sm bg-white dark:bg-zinc-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">


                                    @error('name')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div>
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email
                                        Address</label>
                                    <input type="email" wire:model.defer = "email"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-zinc-600 rounded-md shadow-sm bg-white dark:bg-zinc-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">


                                    @error('email')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div>
                                    <label for="phone"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone
                                        Number</label>
                                    <input type="tel" wire:model.defer = "phone"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-zinc-600 rounded-md shadow-sm bg-white dark:bg-zinc-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">


                                    @error('phone')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="flex justify-end pt-4">
                    <form wire:submit.prevent="save" class="mt-6">
                        <div class="relative inline-flex items-center">
                            <button type="submit" wire:loading.attr="disabled"
                                class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 hover:cursor-pointer text-white rounded-md shadow font-semibold text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                                <span wire:loading.remove wire:target="save">Save Changes</span>
                                <span wire:loading wire:target="save">Saving...</span>
                            </button>


                            <div wire:loading wire:target="save" class="absolute right-3 top-1/2 -translate-y-1/2">
                                <svg class="w-4 h-4 animate-spin text-white" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4" />
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                                </svg>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
