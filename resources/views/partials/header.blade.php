<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex">
                <a href="{{ url('/') }}" class="flex-shrink-0 flex items-center">
                    <img class="h-8 w-auto" src="{{ url('/images/logo.svg') }}" alt="NewsBlog">
                </a>
            </div>
            <div class="ml-3 relative">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-white flex items-center space-x-4">
                        <span>{{ __('Dashboard') }}</span>
                        <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}">
                    </a>
                @endauth

                @guest
                    <div class="space-x-4">
                        <a href="{{ route('login') }}" class="text-white">{{ __('Login') }}</a>
                        <a href="{{ route('register') }}" class="text-white bg-indigo-600 px-8 py-2 rounded">{{ __('Register') }}</a>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>