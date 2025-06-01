<nav class="bg-gradient-to-br from-slate-900 to-slate-800 shadow-xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="flex items-center">
                    <svg class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <span class="ml-2 text-2xl font-bold text-white tracking-tight">Jendela<span class="text-yellow-300">Informasi</span></span>
                </a>
            </div>

            <div class="hidden md:flex md:space-x-8">
                <a href="/" class="px-3 py-2 rounded-md text-lg text-white hover:text-amber-400 transition-colors duration-300 font-medium {{ request()->is('/') ? 'text-amber-400' : '' }}">
                    <i class="fas fa-home mr-2"></i>Beranda
                </a>
                <a href="{{ route('about') }}" class="px-3 py-2 rounded-md text-lg text-white hover:text-amber-400 transition-colors duration-300 font-medium {{ request()->is('about') ? 'text-amber-400' : '' }}">
                    <i class="fas fa-info-circle mr-2"></i>Tentang
                </a>
                <a href="{{ route('berita') }}" class="px-3 py-2 rounded-md text-lg text-white hover:text-amber-400 transition-colors duration-300 font-medium {{ request()->is('berita') ? 'text-amber-400' : '' }}">
                    <i class="fas fa-newspaper mr-2"></i>Berita 
                </a>
                <a href="{{ route('chat.index') }}" class="px-3 py-2 rounded-md text-lg text-white hover:text-amber-400 transition-colors duration-300 font-medium {{ request()->is('/') ? 'text-amber-400' : '' }}">
                    <i class="fas fa-globe mr-2"></i>Chat
                </a>
            </div>

            <div class="flex items-center">
                @auth
                    <!-- User Dropdown -->
                    <div x-data="{ open: false }" class="relative ml-4">
                        <button @click="open = !open" class="flex items-center focus:outline-none">
                            <div class="relative">
                                <div class="h-10 w-10 rounded-full bg-white flex items-center justify-center text-blue-600 font-bold text-lg">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="absolute top-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-400 ring-2 ring-white"></span>
                            </div>
                            <span class="ml-2 text-white font-medium hidden lg:inline">{{ Auth::user()->name }}</span>
                            <svg class="ml-1 h-5 w-5 text-white transition-transform duration-200" :class="{ 'transform rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.away="open = false" 
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="origin-top-right absolute right-0 mt-2 w-64 rounded-lg shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                            
                            <!-- User Info -->
                            <div class="px-4 py-3 border-b border-gray-200 bg-amber-400 rounded-t-lg">
                                <p class="text-sm font-medium text-black">{{ Auth::user()->name }}</p>
                                <p class="text-xs font-medium text-black truncate">{{ Auth::user()->email }}</p>
                            </div>
                            
                            <!-- Menu Items -->
                            <div class="py-1">
                                <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                                    <i class="fas fa-user-circle mr-3 text-blue-500 w-5 text-center"></i>
                                    Profil Saya
                                </a>
                                @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.news.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                                    <i class="fas fa-tachometer-alt mr-3 text-blue-500 w-5 text-center"></i>
                                    Dashboard Admin
                                </a>
                                @endif
                                <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                                    <i class="fas fa-cog mr-3 text-blue-500 w-5 text-center"></i>
                                    Pengaturan
                                </a>
                            </div>
                            
                            <!-- Logout -->
                            <div class="py-1 border-t border-gray-200">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700">
                                        <i class="fas fa-sign-out-alt mr-3 text-red-500 w-5 text-center"></i>
                                        Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Login/Register Buttons -->
                    <div class="flex space-x-3">
                        <a href="{{ route('login') }}" class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-blue-600 bg-white hover:bg-blue-50 shadow-sm transition duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                        </a>
                        <a href="{{ route('register') }}" class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 shadow-sm transition duration-300">
                            <i class="fas fa-user-plus mr-2"></i>Daftar
                        </a>
                    </div>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-yellow-300 hover:bg-blue-700 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="open" class="md:hidden bg-blue-700">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-blue-600 hover:text-yellow-300">
                <i class="fas fa-home mr-2"></i>Beranda
            </a>
            <a href="/about" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-blue-600 hover:text-yellow-300">
                <i class="fas fa-info-circle mr-2"></i>Tentang
            </a>
            <a href="/news" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-blue-600 hover:text-yellow-300">
                <i class="fas fa-newspaper mr-2"></i>Berita
            </a>
            <a href="/international" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-blue-600 hover:text-yellow-300">
                <i class="fas fa-globe mr-2"></i>Internasional
            </a>
        </div>
        @guest
        <div class="pt-4 pb-3 border-t border-blue-600 px-5">
            <div class="flex space-x-2">
                <a href="{{ route('login') }}" class="w-full px-4 py-2 border border-transparent text-center text-sm font-medium rounded-md text-blue-600 bg-white hover:bg-blue-50 shadow-sm">
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                </a>
                <a href="{{ route('register') }}" class="w-full px-4 py-2 border border-transparent text-center text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 shadow-sm">
                    <i class="fas fa-user-plus mr-2"></i>Daftar
                </a>
            </div>
        </div>
        @endguest
    </div>
</nav>