<nav class="bg-gray-900 border-gray-700 fixed top-0 left-0 w-full z-50">
    <div class="max-w-screen-xl mx-auto p-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
    <div class="relative mr-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 24 24" fill="none">
            <path 
                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.071 0l-.344.344a2.5 2.5 0 01-3.536 0l-.344-.344z" 
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round" 
                stroke-linejoin="round"
                class="text-blue-600"
            />
        </svg>
        <!-- Animasi Lingkaran yang Diperbaiki -->
        <div class="absolute inset-0 animate-ping rounded-full bg-blue-500 opacity-25 w-16 h-16 -top-2 -left-2"></div>
    </div>
    <span class="text-2xl font-medium tracking-wide text-blue-600 font-['Lora']">INKSPIRE</span>
</div>

            <!-- Desktop Navigation Links -->
            <div class="hidden md:flex items-center justify-center flex-1 mx-4">
                <div class="flex items-center space-x-8">
                    <a href="{{ url('/') }}" class="flex items-center group {{ Request::is('/') ? 'text-blue-500' : 'text-gray-400 hover:text-blue-500' }}">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Home
                    </a>
                    <a href="{{ url('/blogs') }}" class="flex items-center group {{ Request::is('blogs') ? 'text-blue-500' : 'text-gray-400 hover:text-blue-500' }}">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                        Blog
                    </a>
                    <a href="{{ url('/about') }}" class="flex items-center group {{ Request::is('about') ? 'text-blue-500' : 'text-gray-400 hover:text-blue-500' }}">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        About
                    </a>
                    <a href="{{ url('/report') }}" class="flex items-center group {{ Request::is('report') ? 'text-blue-500' : 'text-gray-400 hover:text-blue-500' }}">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Report
                    </a>
                    @auth
                        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'author')
                            <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('author.dashboard') }}" 
                               class="flex items-center group {{ Request::is('dashboard') ? 'text-blue-500' : 'text-gray-400 hover:text-blue-500' }}">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                                </svg>
                                Dashboard
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Auth Buttons -->
            <div class="flex items-center">
                @auth
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="flex items-center text-gray-400 hover:text-red-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="flex items-center text-gray-400 hover:text-blue-500">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Login
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <button 
                id="mobile-menu-toggle"
                type="button" 
                class="md:hidden ml-4 p-2 text-gray-400 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600"
            >
                <svg class="w-6 h-6 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4">
            <div class="flex flex-col space-y-4">
                <a href="{{ url('/') }}" class="flex items-center px-4 py-2 text-base {{ Request::is('/') ? 'text-blue-500' : 'text-gray-400 hover:text-blue-500 hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Home
                </a>
                <a href="{{ url('/blogs') }}" class="flex items-center px-4 py-2 text-base {{ Request::is('blogs') ? 'text-blue-500' : 'text-gray-400 hover:text-blue-500 hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    Blog
                </a>
                <a href="{{ url('/about') }}" class="flex items-center px-4 py-2 text-base {{ Request::is('about') ? 'text-blue-500' : 'text-gray-400 hover:text-blue-500 hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    About
                </a>
                <a href="{{ url('/report') }}" class="flex items-center px-4 py-2 text-base {{ Request::is('report') ? 'text-blue-500' : 'text-gray-400 hover:text-blue-500 hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Report
                </a>
                @auth
    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'author')
        <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('author.dashboard') }}" 
           class="flex items-center px-4 py-2 text-base {{ Request::is('dashboard') ? 'text-blue-500' : 'text-gray-400 hover:text-blue-500 hover:bg-gray-800' }}">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
            </svg>
            Dashboard
        </a>
    @endif
@endauth
            </div>
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = mobileMenuToggle.querySelector('svg');
    
    mobileMenuToggle.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
        menuIcon.classList.toggle('rotate-90');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        if (!mobileMenu.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('rotate-90');
        }
    });
});
</script>



