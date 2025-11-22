<x-app-layout>
    <!-- TOAST NOTIFICATION -->
    @if(session('success'))
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
                        <p class="mt-1 text-sm text-gray-600">{{ session('success') }}</p>
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

    @if(session('error'))
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
        <div class="bg-white rounded-2xl shadow-2xl border-2 border-red-500 overflow-hidden">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-3 flex-1">
                        <p class="text-sm font-bold text-gray-900">Error!</p>
                        <p class="mt-1 text-sm text-gray-600">{{ session('error') }}</p>
                    </div>
                    <button @click="show = false" class="ml-4 flex-shrink-0 text-gray-400 hover:text-gray-600">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="h-1 bg-red-500"></div>
        </div>
    </div>
    @endif

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
                <a href="{{ route('katalog') }}" class="text-gray-500 hover:text-[#5EA38B] transition-colors">
                    Katalog
                </a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-[#5EA38B] font-medium">Detail Buku</span>
            </nav>
        </div>
    </section>

    <!-- BOOK DETAIL SECTION -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12 mb-16">
                
                <!-- BOOK COVER (LEFT) -->
                <div class="lg:col-span-1">
                    <div class="sticky top-24">
                        <div class="bg-gradient-to-br from-[#F5E8C8]/30 to-[#AFCF8B]/10 rounded-2xl p-6 border-2 border-[#AFCF8B]/30 shadow-xl">
                            <div class="aspect-[3/4] bg-gradient-to-br from-[#5EA38B]/10 to-[#DDAF54]/10 rounded-xl overflow-hidden shadow-lg">
                                @if($book->cover)
                                    <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center p-8">
                                        <svg class="w-24 h-24 text-[#5EA38B]/30 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                        <p class="text-center text-gray-400 font-semibold text-lg">{{ $book->title }}</p>
                                    </div>
                                @endif
                            </div>

                            <!-- STOCK BADGE -->
                            <div class="mt-6 flex items-center justify-between">
                                @if($book->stock_available > 0)
                                    <span class="inline-flex items-center px-4 py-2 bg-[#AFCF8B] text-white rounded-xl font-bold shadow-md">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Tersedia
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded-xl font-bold shadow-md">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Stok Habis
                                    </span>
                                @endif
                                
                                <div class="text-right">
                                    <p class="text-sm text-gray-600">Stok Tersedia</p>
                                    <p class="text-2xl font-bold text-[#5EA38B]">{{ $book->stock_available }}/{{ $book->stock_total }}</p>
                                </div>
                            </div>

                            <!-- POPULARITY -->
                            <div class="mt-4 p-4 bg-gradient-to-r from-[#DDAF54]/10 to-[#7EB396]/10 rounded-xl border border-[#DDAF54]/20">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center text-gray-700">
                                        <svg class="w-5 h-5 text-[#DDAF54] mr-2" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/>
                                        </svg>
                                        <span class="text-sm font-semibold">Total Peminjaman</span>
                                    </div>
                                    <span class="text-2xl font-bold text-[#DDAF54]">{{ $totalBorrowed }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BOOK INFORMATION (RIGHT) -->
                <div class="lg:col-span-2">
                    <div>
                        <!-- TITLE -->
                        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4 leading-tight">
                            {{ $book->title }}
                        </h1>

                        <!-- AUTHOR & GENRE -->
                        <div class="flex flex-wrap items-center gap-4 mb-6">
                            <div class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-[#5EA38B] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span class="font-semibold">Penulis:</span>
                                <span class="ml-2 text-[#5EA38B] font-bold">{{ $book->author->name }}</span>
                            </div>

                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-[#7EB396] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                <span class="px-4 py-1.5 bg-gradient-to-r from-[#7EB396]/20 to-[#AFCF8B]/20 text-[#5EA38B] rounded-full font-bold border border-[#7EB396]/30">
                                    {{ $book->genre->name }}
                                </span>
                            </div>
                        </div>

                        <!-- BOOK DETAILS GRID -->
                        <div class="grid sm:grid-cols-2 gap-4 mb-8">
                            <div class="bg-gradient-to-br from-[#F5E8C8]/30 to-white rounded-xl p-5 border border-gray-200 shadow-sm">
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-[#DDAF54] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <div>
                                        <p class="text-sm text-gray-600">Tahun Terbit</p>
                                        <p class="text-lg font-bold text-gray-900">{{ $book->year }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gradient-to-br from-[#F5E8C8]/30 to-white rounded-xl p-5 border border-gray-200 shadow-sm">
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-[#5EA38B] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                    </svg>
                                    <div>
                                        <p class="text-sm text-gray-600">ISBN</p>
                                        <p class="text-lg font-bold text-gray-900">{{ $book->isbn }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- DESCRIPTION -->
                        <div class="mb-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                                <svg class="w-6 h-6 text-[#5EA38B] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Deskripsi Buku
                            </h3>
                            <div class="bg-gradient-to-br from-gray-50 to-[#F5E8C8]/20 rounded-xl p-6 border border-gray-200">
                                <p class="text-gray-700 leading-relaxed text-lg whitespace-pre-line">{{ $book->description }}</p>
                            </div>
                        </div>

                        <!-- ACTION BUTTONS -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            @guest
                                <a href="{{ route('login') }}" class="flex-1 inline-flex items-center justify-center px-8 py-4 bg-[#5EA38B] text-white font-bold rounded-2xl shadow-lg hover:bg-[#4A8F78] hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                    </svg>
                                    Login untuk Meminjam
                                </a>
                            @else
                                @if($hasActiveBorrow)
                                    <div class="flex-1 flex flex-col">
                                        <button disabled class="inline-flex items-center justify-center px-8 py-4 bg-[#DDAF54]/30 text-gray-600 font-bold rounded-2xl cursor-not-allowed border-2 border-[#DDAF54]/50">
                                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                            </svg>
                                            Sedang Dipinjam
                                        </button>
                                        <p class="text-sm text-[#DDAF54] mt-2 text-center font-semibold">Anda sedang meminjam buku ini</p>
                                    </div>
                                @elseif($book->stock_available > 0)
                                    <a href="{{ route('borrow.create', $book->id) }}" class="flex-1 inline-flex items-center justify-center px-8 py-4 bg-[#5EA38B] text-white font-bold rounded-2xl shadow-lg hover:bg-[#4A8F78] hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                        </svg>
                                        Pinjam Buku Sekarang
                                    </a>
                                @else
                                    <button disabled class="flex-1 inline-flex items-center justify-center px-8 py-4 bg-gray-300 text-gray-500 font-bold rounded-2xl cursor-not-allowed shadow-md">
                                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Stok Habis
                                    </button>
                                @endif
                            @endguest

                            <a href="{{ route('katalog') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white border-2 border-[#5EA38B] text-[#5EA38B] font-bold rounded-2xl hover:bg-[#5EA38B] hover:text-white transition-all duration-300 shadow-sm">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Kembali ke Katalog
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BOOKS BY SAME AUTHOR -->
            @if($authorBooks->isNotEmpty())
                <section class="mb-16">
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 flex items-center">
                            <svg class="w-8 h-8 text-[#DDAF54] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Buku Lain oleh <span class="text-[#5EA38B] ml-2">{{ $book->author->name }}</span>
                        </h2>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                        @foreach($authorBooks as $authorBook)
                            <a href="{{ route('book.detail', $authorBook->id) }}" class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-xl hover:border-[#DDAF54]/30 transition-all duration-300 group">
                                <div class="aspect-[3/4] bg-gradient-to-br from-[#DDAF54]/10 to-[#7EB396]/10 flex items-center justify-center relative overflow-hidden">
                                    @if($authorBook->cover)
                                        <img src="{{ asset('storage/' . $authorBook->cover) }}" alt="{{ $authorBook->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="text-center p-4">
                                            <svg class="w-12 h-12 mx-auto text-[#DDAF54]/30 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                            </svg>
                                            <p class="text-xs text-gray-400 font-medium line-clamp-2">{{ $authorBook->title }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <h3 class="font-bold text-gray-900 text-sm mb-1 line-clamp-2 group-hover:text-[#DDAF54] transition-colors">
                                        {{ $authorBook->title }}
                                    </h3>
                                    <p class="text-xs text-gray-600">{{ $authorBook->genre->name }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- RELATED BOOKS BY GENRE -->
            @if($relatedBooks->isNotEmpty())
                <section>
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 flex items-center">
                            <svg class="w-8 h-8 text-[#5EA38B] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            Buku Terkait
                        </h2>
                        <a href="{{ route('katalog', ['genre' => $book->genre_id]) }}" class="text-[#5EA38B] hover:text-[#4A8F78] font-semibold flex items-center space-x-2">
                            <span>Lihat Semua {{ $book->genre->name }}</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                        @foreach($relatedBooks as $related)
                            <a href="{{ route('book.detail', $related->id) }}" class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-xl hover:border-[#5EA38B]/30 transition-all duration-300 group">
                                <div class="aspect-[3/4] bg-gradient-to-br from-[#5EA38B]/10 to-[#AFCF8B]/10 flex items-center justify-center relative overflow-hidden">
                                    @if($related->cover)
                                        <img src="{{ asset('storage/' . $related->cover) }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="text-center p-4">
                                            <svg class="w-12 h-12 mx-auto text-[#5EA38B]/30 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                            </svg>
                                            <p class="text-xs text-gray-400 font-medium line-clamp-2">{{ $related->title }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <h3 class="font-bold text-gray-900 text-sm mb-1 line-clamp-2 group-hover:text-[#5EA38B] transition-colors">
                                        {{ $related->title }}
                                    </h3>
                                    <p class="text-xs text-gray-600">{{ $related->author->name }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </section>
</x-app-layout>
