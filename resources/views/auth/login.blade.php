<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk - {{ config('app.name', 'Literasia') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-white via-[#F5E8C8]/20 to-white">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            
            <!-- Left Side - Branding -->
            <div class="hidden lg:flex flex-col items-center justify-center space-y-6 px-8 text-center">
                <a href="{{ route('welcome') }}" class="flex items-center justify-center space-x-4">
                    <img src="{{ asset('img/logo_literasia.png') }}" alt="Literasia" class="h-16 w-auto">
                </a>

                <div class="space-y-4">
                    <h1 class="text-4xl font-extrabold text-gray-800 leading-tight">Masuk ke Akun Literasia</h1>
                    <p class="text-lg text-gray-600 max-w-md mx-auto">Akses koleksi buku dan fitur perpustakaan Anda.</p>
                </div>

                <div class="mt-8 w-full max-w-md">
                    <svg class="w-full h-auto" viewBox="0 0 400 300" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="80" y="60" width="100" height="140" rx="8" fill="#5EA38B" opacity="0.25"/>
                        <rect x="150" y="80" width="100" height="120" rx="8" fill="#7EB396" opacity="0.35"/>
                        <rect x="220" y="50" width="100" height="150" rx="8" fill="#DDAF54" opacity="0.25"/>
                        <circle cx="150" cy="180" r="15" fill="#AFCF8B" opacity="0.5"/>
                        <circle cx="250" cy="170" r="20" fill="#5EA38B" opacity="0.3"/>
                    </svg>
                </div>
            </div>

            <!-- Right Side - Form Card -->
            <div class="w-full">
                <div class="bg-white rounded-2xl shadow-xl border-2 border-[#E6F3EA] p-8 lg:p-10">
                    <!-- Mobile Logo -->
                    <div class="lg:hidden flex flex-col items-center mb-6">
                        <img src="{{ asset('img/logo_literasia.png') }}" alt="Literasia" class="h-12 w-auto mb-3">
                        <h2 class="text-2xl font-bold text-[#5EA38B]">Masuk</h2>
                    </div>

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="mb-4 p-4 rounded-xl bg-green-50 border border-green-200">
                            <p class="text-sm text-green-700 font-medium">{{ session('status') }}</p>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                                class="block w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#5EA38B] focus:ring-4 focus:ring-[#5EA38B]/10 transition-all duration-200 outline-none" 
                                placeholder="nama@email.com">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                            <input id="password" name="password" type="password" required
                                class="block w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#5EA38B] focus:ring-4 focus:ring-[#5EA38B]/10 transition-all duration-200 outline-none" 
                                placeholder="Masukkan password">
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                                <input id="remember_me" type="checkbox" 
                                    class="rounded border-gray-300 text-[#5EA38B] shadow-sm focus:ring-[#5EA38B] focus:ring-2" 
                                    name="remember">
                                <span class="ms-2 text-sm text-gray-700 font-medium">Ingat saya</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" 
                                    class="text-sm font-semibold text-[#5EA38B] hover:text-[#4A8F78] transition-colors duration-200">
                                    Lupa password?
                                </a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button type="submit" 
                                class="w-full bg-[#5EA38B] hover:bg-[#4A8F78] text-white font-semibold py-3.5 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5">
                                Masuk Sekarang
                            </button>
                        </div>

                        <!-- Register Link -->
                        <div class="text-center pt-2">
                            <p class="text-sm text-gray-600">
                                Belum punya akun? 
                                <a href="{{ route('register') }}" class="font-semibold text-[#5EA38B] hover:text-[#4A8F78] transition-colors duration-200">
                                    Daftar sekarang
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
