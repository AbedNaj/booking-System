@extends('layouts.app')

@section('content')

<section class="hero-bg text-center py-32 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-20"></div>
    <div class="container mx-auto px-4 relative z-10">
        <h2 class="text-6xl font-extrabold mb-6 leading-tight">{!! __('home.hero_title') !!}</h2>
        <p class="text-2xl mb-8 text-gray-100 max-w-2xl mx-auto">{{ __('home.hero_subtitle') }}</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('register') }}" class="bg-white text-blue-600 py-3 px-8 rounded-full font-bold hover:bg-blue-50 transition transform hover:scale-105 inline-flex items-center gap-2">
                {{ __('home.get_started') }}
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
            <a href="#features" class="bg-transparent border-2 border-white text-white py-3 px-8 rounded-full font-bold hover:bg-white hover:text-blue-600 transition">
                {{ __('home.learn_more') }}
            </a>
        </div>
    </div>
</section>

<section id="features" class="py-24 container mx-auto px-4">
    <div class="text-center mb-16">
        <h3 class="text-4xl font-bold mb-4 gradient-text">{{ __('home.features_title') }}</h3>
        <p class="text-gray-600 max-w-2xl mx-auto">{{ __('home.features_subtitle') }}</p>
    </div>
    <div class="grid md:grid-cols-4 sm:grid-cols-2 gap-8">
        <div class="feature-card p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h4 class="text-xl font-bold mb-3">{{ __('home.flexible_scheduling_title') }}</h4>
            <p class="text-gray-600">{{ __('home.flexible_scheduling_desc') }}</p>
        </div>
        <div class="feature-card p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                </svg>
            </div>
            <h4 class="text-xl font-bold mb-3">{{ __('home.custom_link_title') }}</h4>
            <p class="text-gray-600">{{ __('home.custom_link_desc') }}</p>
        </div>
        <div class="feature-card p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl">
            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
            </div>
            <h4 class="text-xl font-bold mb-3">{{ __('home.alerts_title') }}</h4>
            <p class="text-gray-600">{{ __('home.alerts_desc') }}</p>
        </div>
        <div class="feature-card p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl">
            <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
            </div>
            <h4 class="text-xl font-bold mb-3">{{ __('home.reports_title') }}</h4>
            <p class="text-gray-600">{{ __('home.reports_desc') }}</p>
        </div>
    </div>
</section>



<section class="py-16 bg-blue-500 text-white">
    <div class="container mx-auto px-4 text-center">
        <h3 class="text-3xl font-bold mb-4">{{ __('home.cta_title') }}</h3>
        <p class="mb-8 text-xl">{{ __('home.cta_subtitle') }}</p>
        <a href="/register" class="bg-white text-blue-600 py-3 px-8 rounded-full font-bold hover:bg-blue-50 transition transform hover:scale-105 inline-flex items-center gap-2">
            {{ __('home.cta_button') }}
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
        </a>
    </div>
</section>

@endsection
