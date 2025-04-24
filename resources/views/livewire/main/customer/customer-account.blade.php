<div>
    <section class="bg-gray-50 min-h-screen" x-data="{editing:false}">
        <div class="container mx-auto px-4 py-12">
            <div class="bg-white rounded-lg shadow-lg max-w-md mx-auto p-6">

                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">My Account</h1>

                </div>


                <div class="space-y-4">
                    <section x-show="!editing">
                        <div class="flex items-center border-b border-gray-200 pb-4">
                            <i class="fas fa-user text-blue-500 mr-3"></i>
                            <div>
                                <p class="text-sm text-gray-500">Full Name</p>
                                <p class="font-medium">{{ $name }}</p>
                            </div>
                        </div>

                        <div class="flex items-center border-b border-gray-200 pb-4">
                            <i class="fas fa-envelope text-blue-500 mr-3"></i>
                            <div>
                                <p class="text-sm text-gray-500">Email</p>
                                <p class="font-medium">{{ $email }}</p>
                            </div>
                        </div>

                        <div class="flex items-center border-b border-gray-200 pb-4">
                            <i class="fas fa-phone text-blue-500 mr-3"></i>
                            <div>
                                <p class="text-sm text-gray-500">Phone Number</p>
                                <p class="font-medium">{{ $phone }}</p>
                            </div>
                        </div>

                        <div class="flex items-center border-b border-gray-200 pb-4">
                            <i class="fas fa-calendar text-blue-500 mr-3"></i>
                            <div>
                                <p class="text-sm text-gray-500">Account Created</p>
                                <p class="font-medium">{{ $user->created_at->format('d/m/x') }}</p>
                            </div>
                        </div>
                    </section>

                    <section x-show="editing" x-cloak>
                        <form wire:submit.prevent='save' method="POST">
                            @csrf

                            <x-main.auth.input model='name'>Full Name</x-main.auth.input>
                            <x-main.auth.input model='email'>Email</x-main.auth.input>
                            <x-main.auth.input model='phone'>Phone Number</x-main.auth.input>


                            <div class="flex space-x-2 pt-4">
                                <button type="submit" @click="editing = false"
                                    class="bg-blue-500 text-white py-2 px-4  hover:cursor-pointer rounded-md hover:bg-blue-600 transition-colors duration-200">
                                    Save Changes
                                </button>

                                <button type="button" @click="editing = false"
                                    class="bg-gray-200 text-gray-800 hover:cursor-pointer py-2 px-4 rounded-md hover:bg-gray-300 transition-colors duration-200">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </section>

                    <button x-show="!editing" @click="editing = true"
                        class="mt-4 flex items-center bg-blue-500 text-white py-2 hover:cursor-pointer px-4 rounded-md hover:bg-blue-600 transition-colors duration-200">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Personal Information
                    </button>
                </div>




            </div>
        </div>
    </section>
</div>