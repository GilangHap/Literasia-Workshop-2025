<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 md:h-20">
            <!-- Logo Section -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('img/logo_literasia.png') }}" alt="Literasia Logo" class="h-10 md:h-12 w-auto">
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('dashboard') }}" class="{{ (request()->routeIs('dashboard') || request()->routeIs('welcome')) ? 'text-[#4A8F78] bg-[#5EA38B]/10 px-3 py-2 rounded-lg' : 'text-gray-700 hover:text-[#4A8F78]' }} transition-colors duration-300 font-medium">
                    Beranda
                </a>
                <a href="{{ route('katalog') }}" class="{{ request()->routeIs('katalog') ? 'text-[#4A8F78] bg-[#5EA38B]/10 px-3 py-2 rounded-lg' : 'text-gray-700 hover:text-[#4A8F78]' }} transition-colors duration-300 font-medium">
                    Katalog
                </a>
            </div>

            <!-- Right Section -->
            <div class="flex items-center space-x-4">

                <!-- Auth Section -->
                @guest
                    <a href="{{ route('login') }}" class="hidden md:inline-block px-6 py-2.5 bg-[#5EA38B] text-white font-medium rounded-xl hover:bg-[#4A8F78] transition-all duration-300 shadow-sm hover:shadow-md">
                        Masuk
                    </a>
                @else
                    <!-- User Profile Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 md:space-x-3 p-2 rounded-xl hover:bg-gray-100 transition-colors duration-200">
                            <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-gradient-to-br from-[#5EA38B] to-[#7EB396] flex items-center justify-center text-white font-semibold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span class="hidden md:block text-gray-700 font-medium">Profil Saya</span>
                            <svg class="w-4 h-4 text-gray-500 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" 
                             @click.away="open = false"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-lg py-2 border border-gray-100"
                             style="display: none;">
                            
                            <div class="px-4 py-3 border-b border-gray-100">
                                <p class="text-sm text-gray-500">Halo,</p>
                                <p class="text-sm font-semibold text-[#5EA38B]">{{ Auth::user()->name }}</p>
                            </div>

                            <a href="{{ route('member.profile') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-[#4A8F78] transition-colors duration-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Profil Saya
                            </a>

                            <a href="{{ route('riwayat') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-[#4A8F78] transition-colors duration-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                Riwayat Peminjaman
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center w-full px-4 py-3 text-red-600 hover:bg-red-50 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                    <svg class="w-6 h-6 text-[#5EA38B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" 
         @click.away="mobileMenuOpen = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2"
         class="md:hidden bg-white border-t border-gray-100 shadow-lg"
         style="display: none;">
        
        <div class="px-4 py-4 space-y-2">
            <a href="{{ route('dashboard') }}" class="block px-4 py-3 {{ (request()->routeIs('dashboard') || request()->routeIs('welcome')) ? 'bg-[#5EA38B] text-white' : 'text-gray-700 hover:bg-[#5EA38B] hover:text-white' }} rounded-xl transition-all duration-200 font-medium">
                Beranda
            </a>
            <a href="{{ route('katalog') }}" class="block px-4 py-3 {{ request()->routeIs('katalog') ? 'bg-[#5EA38B] text-white' : 'text-gray-700 hover:bg-[#5EA38B] hover:text-white' }} rounded-xl transition-all duration-200 font-medium">
                Katalog
            </a>

            @guest
                <a href="{{ route('login') }}" class="block px-4 py-3 bg-[#5EA38B] text-white text-center rounded-xl hover:bg-[#4A8F78] transition-all duration-300 font-medium shadow-sm">
                    Login
                </a>
            @endguest
        </div>
    </div>
</nav>

<!-- Alpine.js -->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('navbar', () => ({
            mobileMenuOpen: false
        }))
    })
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    
    nav {
        font-family: 'Poppins', sans-serif;
    }
</style>
