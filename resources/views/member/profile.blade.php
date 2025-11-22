<x-app-layout>
    <!-- TOAST NOTIFICATION -->
    @if (session('status') === 'member-updated')
    <div x-data="{ show: true }" 
         x-show="show" 
         x-init="setTimeout(() => show = false, 5000)"
         x-transition:enter="transform ease-out duration-300 transition"
         x-transition:enter-start="translate-x-full opacity-0"
         x-transition:enter-end="translate-x-0 opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="translate-x-0 opacity-100"
         x-transition:leave-end="translate-x-full opacity-0"
         class="fixed top-6 right-6 z-50 max-w-sm w-full">
        <div class="bg-white rounded-2xl shadow-2xl border-2 border-[#5EA38B] overflow-hidden">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-[#5EA38B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-3 flex-1">
                        <p class="text-sm font-bold text-gray-900">Berhasil!</p>
                        <p class="mt-1 text-sm text-gray-600">Data anggota berhasil diperbarui!</p>
                    </div>
                    <button @click="show = false" class="ml-4 flex-shrink-0 text-gray-400 hover:text-gray-600">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="h-1 bg-[#5EA38B]"></div>
        </div>
    </div>
    @endif
    
    @if (session('status') === 'profile-updated')
    <div x-data="{ show: true }" 
         x-show="show" 
         x-init="setTimeout(() => show = false, 5000)"
         x-transition:enter="transform ease-out duration-300 transition"
         x-transition:enter-start="translate-x-full opacity-0"
         x-transition:enter-end="translate-x-0 opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="translate-x-0 opacity-100"
         x-transition:leave-end="translate-x-full opacity-0"
         class="fixed top-6 right-6 z-50 max-w-sm w-full">
        <div class="bg-white rounded-2xl shadow-2xl border-2 border-[#5EA38B] overflow-hidden">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-[#5EA38B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-3 flex-1">
                        <p class="text-sm font-bold text-gray-900">Berhasil!</p>
                        <p class="mt-1 text-sm text-gray-600">Profil berhasil diperbarui!</p>
                    </div>
                    <button @click="show = false" class="ml-4 flex-shrink-0 text-gray-400 hover:text-gray-600">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="h-1 bg-[#5EA38B]"></div>
        </div>
    </div>
    @endif
    
    @if (session('status') === 'password-updated')
    <div x-data="{ show: true }" 
         x-show="show" 
         x-init="setTimeout(() => show = false, 5000)"
         x-transition:enter="transform ease-out duration-300 transition"
         x-transition:enter-start="translate-x-full opacity-0"
         x-transition:enter-end="translate-x-0 opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="translate-x-0 opacity-100"
         x-transition:leave-end="translate-x-full opacity-0"
         class="fixed top-6 right-6 z-50 max-w-sm w-full">
        <div class="bg-white rounded-2xl shadow-2xl border-2 border-[#5EA38B] overflow-hidden">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-[#5EA38B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-3 flex-1">
                        <p class="text-sm font-bold text-gray-900">Berhasil!</p>
                        <p class="mt-1 text-sm text-gray-600">Password berhasil diperbarui!</p>
                    </div>
                    <button @click="show = false" class="ml-4 flex-shrink-0 text-gray-400 hover:text-gray-600">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="h-1 bg-[#5EA38B]"></div>
        </div>
    </div>
    @endif

    <div class="min-h-screen bg-[#F5E8C8] py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <h1 class="text-3xl md:text-4xl font-bold text-[#1F2937] mb-2" style="font-family: 'Poppins', sans-serif;">
                    Profil Saya
                </h1>
                <p class="text-gray-600 text-lg" style="font-family: 'Poppins', sans-serif;">
                    Kelola informasi akun dan data keanggotaan Literasia.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column - Account & Member Info -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Account Information Card -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-semibold text-[#1F2937]" style="font-family: 'Poppins', sans-serif;">
                                Informasi Akun
                            </h2>
                            <svg class="w-6 h-6 text-[#5EA38B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>

                        <div class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-600 mb-1">Nama Lengkap</label>
                                    <p class="text-[#1F2937] font-medium">{{ $user->name }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                                    <p class="text-[#1F2937]">{{ $user->email }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Bergabung</label>
                                    <p class="text-[#1F2937]">{{ $user->created_at->format('d M Y') }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-600 mb-1">Status Email</label>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                        {{ $user->email_verified_at ? 'bg-[#AFCF8B] text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $user->email_verified_at ? 'Terverifikasi' : 'Belum Terverifikasi' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-3 mt-6 pt-6 border-t border-gray-100">
                            <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2.5 bg-[#5EA38B] text-white font-medium rounded-xl hover:bg-[#4A8F78] transition-all duration-300 shadow-sm hover:shadow-md">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Edit Profil
                            </a>
                            <a href="{{ route('profile.password') }}" class="inline-flex items-center px-4 py-2.5 bg-[#DDAF54] text-white font-medium rounded-xl hover:bg-[#C49946] transition-all duration-300 shadow-sm hover:shadow-md">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                </svg>
                                Ganti Password
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="inline-flex items-center px-4 py-2.5 bg-gray-200 text-gray-700 font-medium rounded-xl hover:bg-gray-300 transition-all duration-300 shadow-sm hover:shadow-md">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Member Information Card -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-semibold text-[#1F2937]" style="font-family: 'Poppins', sans-serif;">
                                Informasi Anggota
                            </h2>
                            <svg class="w-6 h-6 text-[#5EA38B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>

                        <div class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-600 mb-1">Nama Lengkap</label>
                                    <p class="text-[#1F2937] font-medium">{{ $user->name }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-600 mb-1">NIM / NIS</label>
                                    <p class="text-[#1F2937]">{{ $member->nim }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-600 mb-1">Nomor HP</label>
                                    <p class="text-[#1F2937]">{{ $member->phone ?? '-' }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-600 mb-1">Status Keanggotaan</label>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                        {{ $member->status === 'active' ? 'bg-[#AFCF8B] text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $member->status === 'active' ? 'Aktif' : 'Tidak Aktif' }}
                                    </span>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <!-- Right Column - Statistics & Recent Borrows -->
                <div class="space-y-6">
                    <!-- Borrowing Statistics -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-xl font-semibold text-[#1F2937] mb-6" style="font-family: 'Poppins', sans-serif;">
                            Ringkasan Peminjaman
                        </h2>

                        <div class="space-y-4">
                            <!-- Sedang Dipinjam -->
                            <div class="flex items-center justify-between p-4 bg-[#F5E8C8] rounded-xl">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-[#5EA38B] rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Sedang Dipinjam</p>
                                        <p class="text-2xl font-bold text-[#5EA38B]">{{ $stats['borrowed'] }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Sudah Dikembalikan -->
                            <div class="flex items-center justify-between p-4 bg-[#F5E8C8] rounded-xl">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-[#7EB396] rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Sudah Dikembalikan</p>
                                        <p class="text-2xl font-bold text-[#5EA38B]">{{ $stats['returned'] }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Terlambat -->
                            <div class="flex items-center justify-between p-4 bg-[#F5E8C8] rounded-xl">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-[#DDAF54] rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Terlambat</p>
                                        <p class="text-2xl font-bold text-[#5EA38B]">{{ $stats['overdue'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Borrows -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-semibold text-[#1F2937]" style="font-family: 'Poppins', sans-serif;">
                                Riwayat Peminjaman Terbaru
                            </h2>
                            <a href="{{ route('riwayat') }}" class="text-[#5EA38B] hover:text-[#4A8F78] text-sm font-medium transition-colors duration-200">
                                Lihat Semua →
                            </a>
                        </div>

                        @if($borrows->count() > 0)
                            <div class="space-y-4">
                                @foreach($borrows as $borrow)
                                    <div class="flex items-center space-x-4 p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-200">
                                        <div class="w-12 h-16 bg-[#5EA38B] rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-sm font-medium text-[#1F2937] truncate">{{ $borrow->book->title }}</h3>
                                            <p class="text-xs text-gray-500">{{ $borrow->borrow_date->format('d M Y') }}</p>
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium mt-1
                                                @if($borrow->status === 'borrowed') bg-[#AFCF8B] text-green-800
                                                @elseif($borrow->status === 'returned') bg-[#7EB396] text-teal-800
                                                @else bg-red-100 text-red-800 @endif">
                                                @if($borrow->status === 'borrowed') Sedang Dipinjam
                                                @elseif($borrow->status === 'returned') Dikembalikan
                                                @else Terlambat @endif
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                <p class="text-gray-500 text-sm">Belum ada riwayat peminjaman</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</x-app-layout>