<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar - {{ config('app.name', 'Literasia') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-white via-[#F5E8C8]/20 to-white">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            
            <!-- Left Side - Branding -->
            <div class="hidden lg:flex flex-col items-center justify-center space-y-6 px-8">
                <a href="{{ route('welcome') }}" class="flex items-center space-x-4">
                    <img src="{{ asset('img/logo_literasia.png') }}" alt="Literasia" class="h-16 w-auto">
                </a>

                <div class="space-y-4">
                    <h1 class="text-4xl font-extrabold text-gray-800 leading-tight">Daftar Akun Literasia</h1>
                    <p class="text-lg text-gray-600 max-w-md">Akses ribuan koleksi buku dan fitur perpustakaan dengan mudah.</p>
                </div>

                <div class="mt-8">
                    <svg class="w-full h-auto" viewBox="0 0 400 300" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="50" y="80" width="120" height="160" rx="8" fill="#5EA38B" opacity="0.2"/>
                        <rect x="140" y="60" width="120" height="180" rx="8" fill="#7EB396" opacity="0.3"/>
                        <rect x="230" y="40" width="120" height="200" rx="8" fill="#DDAF54" opacity="0.2"/>
                        <circle cx="320" cy="80" r="30" fill="#AFCF8B" opacity="0.4"/>
                    </svg>
                </div>
            </div>

            <!-- Right Side - Form Card -->
            <div class="w-full">
                <div class="bg-white rounded-2xl shadow-xl border-2 border-[#E6F3EA] p-8 lg:p-10">
                    <!-- Mobile Logo -->
                    <div class="lg:hidden flex flex-col items-center mb-6">
                        <img src="{{ asset('img/logo_literasia.png') }}" alt="Literasia" class="h-12 w-auto mb-3">
                        <h2 class="text-2xl font-bold text-[#5EA38B]">Daftar Akun</h2>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-5">
                        @csrf

                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                                class="block w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#5EA38B] focus:ring-4 focus:ring-[#5EA38B]/10 transition-all duration-200 outline-none" 
                                placeholder="Masukkan nama lengkap">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required
                                class="block w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#5EA38B] focus:ring-4 focus:ring-[#5EA38B]/10 transition-all duration-200 outline-none" 
                                placeholder="nama@email.com">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- NIM -->
                        <div>
                            <label for="nim" class="block text-sm font-semibold text-gray-700 mb-2">NIM / NIS</label>
                            <input id="nim" name="nim" type="text" value="{{ old('nim') }}" required
                                class="block w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#5EA38B] focus:ring-4 focus:ring-[#5EA38B]/10 transition-all duration-200 outline-none" 
                                placeholder="Masukkan NIM atau NIS">
                            @error('nim')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon <span class="text-gray-400 font-normal">(Opsional)</span></label>
                            <input id="phone" name="phone" type="text" value="{{ old('phone') }}"
                                class="block w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#5EA38B] focus:ring-4 focus:ring-[#5EA38B]/10 transition-all duration-200 outline-none" 
                                placeholder="08xxxxxxxxxx">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                            <input id="password" name="password" type="password" required
                                class="block w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#5EA38B] focus:ring-4 focus:ring-[#5EA38B]/10 transition-all duration-200 outline-none" 
                                placeholder="Minimal 8 karakter">
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                class="block w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#5EA38B] focus:ring-4 focus:ring-[#5EA38B]/10 transition-all duration-200 outline-none" 
                                placeholder="Ulangi password">
                            @error('password_confirmation')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button type="submit" 
                                class="w-full bg-[#5EA38B] hover:bg-[#4A8F78] text-white font-semibold py-3.5 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5">
                                Daftar Sekarang
                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center pt-2">
                            <p class="text-sm text-gray-600">
                                Sudah punya akun? 
                                <a href="{{ route('login') }}" class="font-semibold text-[#5EA38B] hover:text-[#4A8F78] transition-colors duration-200">
                                    Masuk di sini
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
