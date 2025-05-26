@php
    use App\Enums\SettingKey;
@endphp

<div class="max-w-5xl mx-auto py-16 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-white">


    @php
        $logo = $siteSettings[SettingKey::Logo->value] ?? null;
    @endphp
    @if ($logo)
        <div class="flex justify-center mb-10">
            <div class="relative group">
                <img src="{{ $logo }}" alt="Site Logo"
                    class="h-64 w-auto rounded-xl shadow-lg transition-transform duration-300 group-hover:scale-105">
                <div
                    class="absolute inset-0 rounded-xl bg-gradient-to-r from-blue-400/20 to-purple-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>
            </div>
        </div>
    @endif


    @php
        $heading = $siteSettings[SettingKey::mainHeading->value] ?? null;
        $subheading = $siteSettings[SettingKey::subHeading->value] ?? null;
    @endphp
    @if ($heading || $subheading)
        <div class="text-center mb-10 animate-fade-in">
            @if ($heading)
                <h1
                    class="text-4xl font-extrabold tracking-tight sm:text-5xl mb-3 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent dark:from-blue-400 dark:to-purple-400">
                    {{ $heading }}
                </h1>
            @endif

            @if ($subheading)
                <p class="mt-3 text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    {{ $subheading }}
                </p>
            @endif

            <div class="mt-5">
                <a wire:navigate href="{{ route('tenant.service.list', ['tenants' => $tenants]) }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800 transition duration-150 ease-in-out shadow-md hover:shadow-lg">
                    Get Started
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    @endif


    @php
        $desc = $siteSettings[SettingKey::projectDesc->value] ?? null;
    @endphp
    @if ($desc)
        <div class="py-8 border-t border-b border-gray-200 dark:border-gray-700 mb-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">About Us</h2>
                <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ $desc }}
                </p>
            </div>
        </div>
    @endif

    @php
        $email = $siteSettings[SettingKey::siteEmail->value] ?? null;
        $phone = $siteSettings[SettingKey::sitePhone->value] ?? null;
        $address = $siteSettings[SettingKey::siteAddress->value] ?? null;
    @endphp

    @if ($email || $phone || $address)
        <div id="contact" class="pt-4">
            <h2 class="text-2xl font-bold text-center mb-8 text-gray-800 dark:text-gray-100">Contact Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">


                @if ($email)
                    <div
                        class="bg-white dark:bg-zinc-800 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 flex items-start">
                        <div class="rounded-full bg-blue-100 dark:bg-blue-900 p-3 mr-4">
                            <svg class="h-6 w-6 text-blue-600 dark:text-blue-300" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-2 text-gray-800 dark:text-white">Email</h3>
                            <a href="mailto:{{ $email }}"
                                class="text-blue-600 dark:text-blue-400 hover:underline break-all">
                                {{ $email }}
                            </a>
                        </div>
                    </div>
                @endif


                @if ($phone)
                    <div
                        class="bg-white dark:bg-zinc-800 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 flex items-start">
                        <div class="rounded-full bg-green-100 dark:bg-green-900 p-3 mr-4">
                            <svg class="h-6 w-6 text-green-600 dark:text-green-300" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-2 text-gray-800 dark:text-white">Phone</h3>
                            <a href="tel:{{ $phone }}"
                                class="text-green-600 dark:text-green-400 hover:underline">
                                {{ $phone }}
                            </a>
                        </div>
                    </div>
                @endif


                @if ($address)
                    <div
                        class="bg-white dark:bg-zinc-800 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 flex items-start">
                        <div class="rounded-full bg-purple-100 dark:bg-purple-900 p-3 mr-4">
                            <svg class="h-6 w-6 text-purple-600 dark:text-purple-300" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-2 text-gray-800 dark:text-white">Address</h3>
                            <p class="text-gray-700 dark:text-gray-300">
                                {{ $address }}
                            </p>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    @endif

</div>
