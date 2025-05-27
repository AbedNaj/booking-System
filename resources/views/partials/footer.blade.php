<footer id="contact" class="bg-gray-900 text-white py-16">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-8 mb-8">
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h4 class="text-2xl font-bold">{{ __('footer.brand') }}</h4>
                </div>
                <p class="text-gray-400">{{ __('footer.description') }}</p>
            </div>
            <div>
                <h5 class="font-bold mb-4">{{ __('footer.quick_links') }}</h5>
                <ul class="space-y-2">
                    <li><a href="#features" class="text-gray-400 hover:text-white transition">{{ __('footer.features') }}</a></li>
                    <li><a href="#pricing" class="text-gray-400 hover:text-white transition">{{ __('footer.pricing') }}</a></li>
                    <li><a href="#testimonials" class="text-gray-400 hover:text-white transition">{{ __('footer.testimonials') }}</a></li>
                    <li><a href="/blog" class="text-gray-400 hover:text-white transition">{{ __('footer.blog') }}</a></li>
                </ul>
            </div>
            <div>
                <h5 class="font-bold mb-4">{{ __('footer.support') }}</h5>
                <ul class="space-y-2">
                    <li><a href="/help" class="text-gray-400 hover:text-white transition">{{ __('footer.help_center') }}</a></li>
                    <li><a href="/contact" class="text-gray-400 hover:text-white transition">{{ __('footer.contact_us') }}</a></li>
                    <li><a href="/privacy" class="text-gray-400 hover:text-white transition">{{ __('footer.privacy_policy') }}</a></li>
                    <li><a href="/terms" class="text-gray-400 hover:text-white transition">{{ __('footer.terms') }}</a></li>
                </ul>
            </div>
  
        </div>
        <div class="border-t border-gray-800 pt-8 text-center">
            <p class="text-gray-400">&copy; 2025 {{ __('footer.brand') }}. {{ __('footer.rights') }}</p>
        </div>
    </div>
</footer>
