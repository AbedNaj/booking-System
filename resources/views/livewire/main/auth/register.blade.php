<div>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md border border-gray-200">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Create Account</h2>

            <form wire:submit.prevent="register" x-data="{ loading: false, showPassword: false }">



                <x-main.auth.input model='name' placeholder="Full Name">

                    Full Name
                </x-main.auth.input>



                <x-main.auth.input model='email' placeholder="example@email.com">

                    Email Address
                </x-main.auth.input>


                <x-main.auth.input model='phone' placeholder="phone">

                    Phone Number
                </x-main.auth.input>


                <x-main.auth.input model='address' placeholder="address">
                    Address
                </x-main.auth.input>

                <x-main.auth.password></x-main.auth.password>


                <x-main.auth.button target="register">
                    Create Account
                </x-main.auth.button>



                <div class="mt-6 text-center">
                    <p class="text-gray-600">
                        Already have an account?
                        <a href="{{ route('customer.login', ['tenants' => request()->segment(1)]) }}"
                            class="text-blue-600 hover:text-blue-800 font-medium">Sign in</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>