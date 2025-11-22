<x-app-layout>
    <!-- BREADCRUMB -->
    <section class="bg-gradient-to-r from-[#F5E8C8]/30 to-white py-4 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center space-x-2 text-sm">
                <a href="{{ route('beranda') }}" class="text-gray-500 hover:text-[#5EA38B] transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-[#5EA38B] font-medium">Peminjaman Saya</span>
            </nav>
        </div>
    </section>

    <!-- HEADER -->
    <section class="bg-gradient-to-br from-[#5EA38B]/5 to-[#AFCF8B]/5 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-[#5EA38B] to-[#7EB396] rounded-2xl shadow-lg mb-4">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-3">Peminjaman Saya</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Lihat daftar buku yang sedang kamu pinjam dan riwayat peminjamanmu.</p>
        </div>
    </section>

    <!-- STATISTICS CARDS -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
                
                <!-- Sedang Dipinjam -->
                <div class="bg-white rounded-2xl shadow-lg border-2 border-[#5EA38B]/20 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#5EA38B]/10 to-[#7EB396]/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#5EA38B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-600 mb-1">Sedang Dipinjam</h3>
                    <p class="text-3xl font-extrabold text-[#5EA38B]">{{ $stats['borrowed'] }}</p>
                </div>

                <!-- Sudah Dikembalikan -->
                <div class="bg-white rounded-2xl shadow-lg border-2 border-[#AFCF8B]/20 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#AFCF8B]/10 to-[#7EB396]/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#AFCF8B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-600 mb-1">Sudah Dikembalikan</h3>
                    <p class="text-3xl font-extrabold text-[#AFCF8B]">{{ $stats['returned'] }}</p>
                </div>

                <!-- Terlambat -->
                <div class="bg-white rounded-2xl shadow-lg border-2 border-red-200 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-50 to-red-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-600 mb-1">Terlambat</h3>
                    <p class="text-3xl font-extrabold text-red-500">{{ $stats['overdue'] }}</p>
                </div>

                <!-- Total Peminjaman -->
                <div class="bg-white rounded-2xl shadow-lg border-2 border-[#DDAF54]/20 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#DDAF54]/10 to-[#F5E8C8]/30 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#DDAF54]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-600 mb-1">Total Peminjaman</h3>
                    <p class="text-3xl font-extrabold text-[#DDAF54]">{{ $stats['total'] }}</p>
                </div>
            </div>

            @if($stats['total'] == 0)
                <!-- EMPTY STATE -->
                <div class="text-center py-16 px-4">
                    <div class="inline-flex items-center justify-center w-32 h-32 bg-gradient-to-br from-[#5EA38B]/10 to-[#AFCF8B]/10 rounded-full mb-6">
                        <svg class="w-16 h-16 text-[#5EA38B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Belum Ada Peminjaman</h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto">Ayo mulai pinjam buku favoritmu dan mulai petualangan membacamu!</p>
                    <a href="{{ route('katalog') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-[#5EA38B] to-[#7EB396] text-white font-bold rounded-2xl shadow-lg hover:from-[#4A8F78] hover:to-[#5EA38B] hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Lihat Katalog
                    </a>
                </div>
            @else

                <!-- SEDANG DIPINJAM -->
                @if($active->count() > 0)
                    <section class="mb-12">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-3xl font-bold text-gray-900 flex items-center">
                                <svg class="w-8 h-8 text-[#5EA38B] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                Sedang Dipinjam
                            </h2>
                            <span class="px-4 py-2 bg-[#5EA38B]/10 text-[#5EA38B] rounded-xl font-bold">{{ $active->count() }} Buku</span>
                        </div>

                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($active as $borrow)
                                <div class="bg-white rounded-2xl shadow-lg border-2 border-[#5EA38B]/20 overflow-hidden hover:shadow-xl transition-all duration-300 group">
                                    <div class="flex gap-4 p-5">
                                        <!-- Book Cover -->
                                        <div class="w-20 h-28 bg-gradient-to-br from-[#5EA38B]/10 to-[#DDAF54]/10 rounded-xl overflow-hidden shadow-md flex-shrink-0">
                                            @if($borrow->book->cover)
                                                <img src="{{ asset('storage/' . $borrow->book->cover) }}" alt="{{ $borrow->book->title }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center">
                                                    <svg class="w-10 h-10 text-[#5EA38B]/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Book Info -->
                                        <div class="flex-1 min-w-0">
                                            <h3 class="font-bold text-gray-900 text-base mb-1 line-clamp-2 group-hover:text-[#5EA38B] transition-colors">
                                                {{ $borrow->book->title }}
                                            </h3>
                                            <p class="text-sm text-gray-600 mb-3">{{ $borrow->book->author->name }}</p>
                                            
                                            <div class="space-y-1 text-xs">
                                                <div class="flex items-center text-gray-600">
                                                    <svg class="w-4 h-4 mr-1.5 text-[#5EA38B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                    </svg>
                                                    <span class="font-semibold">Pinjam:</span>
                                                    <span class="ml-1">{{ $borrow->borrow_date->format('d M Y') }}</span>
                                                </div>
                                                <div class="flex items-center text-gray-600">
                                                    <svg class="w-4 h-4 mr-1.5 text-[#DDAF54]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    <span class="font-semibold">Jatuh Tempo:</span>
                                                    <span class="ml-1">{{ $borrow->due_date->format('d M Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Status & Action -->
                                    <div class="px-5 pb-5 flex items-center justify-between gap-3">
                                        <span class="px-3 py-1.5 bg-[#5EA38B]/10 text-[#5EA38B] rounded-lg text-xs font-bold">Dipinjam</span>
                                        <a href="{{ route('book.detail', $borrow->book->id) }}" class="text-sm text-[#5EA38B] hover:text-[#4A8F78] font-semibold flex items-center">
                                            Lihat Detail
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif

                <!-- TERLAMBAT -->
                @if($overdue->count() > 0)
                    <section class="mb-12">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-3xl font-bold text-gray-900 flex items-center">
                                <svg class="w-8 h-8 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Terlambat
                            </h2>
                            <span class="px-4 py-2 bg-red-50 text-red-500 rounded-xl font-bold">{{ $overdue->count() }} Buku</span>
                        </div>

                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($overdue as $borrow)
                                @php
                                    $daysLate = abs((int) now()->diffInDays($borrow->due_date));
                                @endphp
                                <div class="bg-white rounded-2xl shadow-lg border-2 border-red-200 overflow-hidden hover:shadow-xl transition-all duration-300 group">
                                    <div class="flex gap-4 p-5">
                                        <!-- Book Cover -->
                                        <div class="w-20 h-28 bg-gradient-to-br from-red-50 to-red-100 rounded-xl overflow-hidden shadow-md flex-shrink-0">
                                            @if($borrow->book->cover)
                                                <img src="{{ asset('storage/' . $borrow->book->cover) }}" alt="{{ $borrow->book->title }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center">
                                                    <svg class="w-10 h-10 text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Book Info -->
                                        <div class="flex-1 min-w-0">
                                            <h3 class="font-bold text-gray-900 text-base mb-1 line-clamp-2">
                                                {{ $borrow->book->title }}
                                            </h3>
                                            <p class="text-sm text-gray-600 mb-3">{{ $borrow->book->author->name }}</p>
                                            
                                            <div class="space-y-1 text-xs">
                                                <div class="flex items-center text-gray-600">
                                                    <svg class="w-4 h-4 mr-1.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    <span class="font-semibold">Jatuh Tempo:</span>
                                                    <span class="ml-1">{{ $borrow->due_date->format('d M Y') }}</span>
                                                </div>
                                                <div class="flex items-center text-red-600 font-bold">
                                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    Terlambat {{ $daysLate }} hari
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Status & Action -->
                                    <div class="px-5 pb-5 flex items-center justify-between gap-3">
                                        <span class="px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-xs font-bold">Overdue</span>
                                        <a href="{{ route('book.detail', $borrow->book->id) }}" class="text-sm text-red-600 hover:text-red-700 font-semibold flex items-center">
                                            Lihat Detail
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif

                <!-- RIWAYAT PEMINJAMAN -->
                @if($returned->count() > 0)
                    <section>
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-3xl font-bold text-gray-900 flex items-center">
                                <svg class="w-8 h-8 text-[#AFCF8B] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Riwayat Peminjaman
                            </h2>
                            <span class="px-4 py-2 bg-[#AFCF8B]/10 text-[#AFCF8B] rounded-xl font-bold">{{ $returned->count() }} Buku</span>
                        </div>

                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($returned as $borrow)
                                <div class="bg-white rounded-2xl shadow-lg border-2 border-[#AFCF8B]/20 overflow-hidden hover:shadow-xl transition-all duration-300 group">
                                    <div class="flex gap-4 p-5">
                                        <!-- Book Cover -->
                                        <div class="w-20 h-28 bg-gradient-to-br from-[#AFCF8B]/10 to-[#7EB396]/10 rounded-xl overflow-hidden shadow-md flex-shrink-0">
                                            @if($borrow->book->cover)
                                                <img src="{{ asset('storage/' . $borrow->book->cover) }}" alt="{{ $borrow->book->title }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center">
                                                    <svg class="w-10 h-10 text-[#AFCF8B]/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Book Info -->
                                        <div class="flex-1 min-w-0">
                                            <h3 class="font-bold text-gray-900 text-base mb-1 line-clamp-2">
                                                {{ $borrow->book->title }}
                                            </h3>
                                            <p class="text-sm text-gray-600 mb-3">{{ $borrow->book->author->name }}</p>
                                            
                                            <div class="space-y-1 text-xs">
                                                <div class="flex items-center text-gray-600">
                                                    <svg class="w-4 h-4 mr-1.5 text-[#5EA38B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                    </svg>
                                                    <span class="font-semibold">Pinjam:</span>
                                                    <span class="ml-1">{{ $borrow->borrow_date->format('d M Y') }}</span>
                                                </div>
                                                <div class="flex items-center text-gray-600">
                                                    <svg class="w-4 h-4 mr-1.5 text-[#AFCF8B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    <span class="font-semibold">Kembali:</span>
                                                    <span class="ml-1">{{ $borrow->return_date->format('d M Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Status & Action -->
                                    <div class="px-5 pb-5 flex items-center justify-between gap-3">
                                        <span class="px-3 py-1.5 bg-[#AFCF8B]/10 text-[#AFCF8B] rounded-lg text-xs font-bold">Dikembalikan</span>
                                        <a href="{{ route('book.detail', $borrow->book->id) }}" class="text-sm text-[#AFCF8B] hover:text-[#5EA38B] font-semibold flex items-center">
                                            Lihat Detail
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif

            @endif
        </div>
    </section>
</x-app-layout>
