<x-app-layout>
    <!-- HERO SECTION WITH SEARCH -->
    <section class="bg-gradient-to-br from-[#F5E8C8]/40 via-white to-[#AFCF8B]/20 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-3">
                    Katalog <span class="text-[#5EA38B]">Buku</span>
                </h1>
                <p class="text-gray-600 text-lg">Temukan buku favoritmu dari koleksi kami</p>
            </div>

            <!-- SEARCH BAR -->
            <form method="GET" action="{{ route('katalog') }}" class="max-w-2xl mx-auto mb-6">
                <div class="flex items-center bg-white rounded-2xl shadow-xl border-2 border-[#5EA38B]/20 overflow-hidden">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}"
                        placeholder="Cari judul buku, penulis, atau genre..."
                        class="flex-1 px-6 py-4 text-gray-700 placeholder-gray-400 focus:outline-none border-0"
                    >
                    <button 
                        type="submit"
                        class="px-8 py-4 bg-[#5EA38B] text-white font-semibold hover:bg-[#4A8F78] transition-all duration-300"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                </div>
            </form>

            <!-- ACTIVE FILTERS DISPLAY -->
            @if(request('search') || request('genre') || request('sort'))
                <div class="max-w-3xl mx-auto flex flex-wrap items-center gap-2 mb-4">
                    <span class="text-sm text-gray-600">Filter aktif:</span>
                    
                    @if(request('search'))
                        <span class="inline-flex items-center px-4 py-2 bg-[#5EA38B]/10 text-[#5EA38B] rounded-full text-sm font-medium">
                            Pencarian: "{{ request('search') }}"
                            <a href="{{ route('katalog', array_filter(request()->except('search'))) }}" class="ml-2 hover:text-[#4A8F78]">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </a>
                        </span>
                    @endif

                    @if(request('genre'))
                        @php
                            $activeGenre = $genres->find(request('genre'));
                        @endphp
                        @if($activeGenre)
                            <span class="inline-flex items-center px-4 py-2 bg-[#5EA38B]/10 text-[#5EA38B] rounded-full text-sm font-medium">
                                Genre: {{ $activeGenre->name }}
                                <a href="{{ route('katalog', array_filter(request()->except('genre'))) }}" class="ml-2 hover:text-[#4A8F78]">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </a>
                            </span>
                        @endif
                    @endif

                    <a href="{{ route('katalog') }}" class="text-sm text-red-600 hover:text-red-700 font-medium ml-2">
                        Hapus semua filter
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                
                <!-- SIDEBAR FILTERS -->
                <aside class="lg:w-64 flex-shrink-0">
                    <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 p-6 sticky top-24">
                        
                        <!-- SORT OPTIONS -->
                        <div class="mb-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-[#5EA38B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4"/>
                                </svg>
                                Urutkan
                            </h3>
                            <div class="space-y-2">
                                <a href="{{ route('katalog', array_merge(request()->except('sort'), [])) }}" 
                                   class="block px-4 py-2.5 rounded-xl {{ !request('sort') ? 'bg-[#5EA38B] text-white' : 'bg-gray-50 text-gray-700 hover:bg-[#5EA38B]/10' }} transition-all duration-200 text-sm font-medium">
                                    Terbaru
                                </a>
                                <a href="{{ route('katalog', array_merge(request()->except('sort'), ['sort' => 'popular'])) }}" 
                                   class="block px-4 py-2.5 rounded-xl {{ request('sort') == 'popular' ? 'bg-[#5EA38B] text-white' : 'bg-gray-50 text-gray-700 hover:bg-[#5EA38B]/10' }} transition-all duration-200 text-sm font-medium">
                                    Paling Populer
                                </a>
                                <a href="{{ route('katalog', array_merge(request()->except('sort'), ['sort' => 'az'])) }}" 
                                   class="block px-4 py-2.5 rounded-xl {{ request('sort') == 'az' ? 'bg-[#5EA38B] text-white' : 'bg-gray-50 text-gray-700 hover:bg-[#5EA38B]/10' }} transition-all duration-200 text-sm font-medium">
                                    A-Z (Judul)
                                </a>
                            </div>
                        </div>

                        <!-- GENRE FILTER -->
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-[#5EA38B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                Kategori
                            </h3>
                            <div class="space-y-2 max-h-96 overflow-y-auto pr-2">
                                <a href="{{ route('katalog', request()->except('genre')) }}" 
                                   class="block px-4 py-2.5 rounded-xl {{ !request('genre') ? 'bg-[#5EA38B] text-white' : 'bg-gray-50 text-gray-700 hover:bg-[#5EA38B]/10' }} transition-all duration-200 text-sm font-medium">
                                    Semua Kategori
                                </a>
                                @foreach($genres as $genre)
                                    <a href="{{ route('katalog', array_merge(request()->except('genre'), ['genre' => $genre->id])) }}" 
                                       class="block px-4 py-2.5 rounded-xl {{ request('genre') == $genre->id ? 'bg-[#5EA38B] text-white' : 'bg-gray-50 text-gray-700 hover:bg-[#5EA38B]/10' }} transition-all duration-200 text-sm font-medium">
                                        {{ $genre->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- BOOKS GRID -->
                <div class="flex-1">
                    <!-- RESULTS INFO -->
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">
                            @if(request('search'))
                                Hasil Pencarian
                            @elseif(request('genre'))
                                {{ $genres->find(request('genre'))->name ?? 'Kategori' }}
                            @else
                                Semua Buku
                            @endif
                            <span class="text-[#5EA38B] text-lg ml-2">({{ $books->total() }} buku)</span>
                        </h2>

                        <!-- MOBILE FILTER TOGGLE -->
                        <button 
                            x-data 
                            @click="$dispatch('toggle-mobile-filter')"
                            class="lg:hidden px-4 py-2 bg-[#5EA38B] text-white rounded-xl flex items-center space-x-2 hover:bg-[#4A8F78] transition-colors"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                            </svg>
                            <span>Filter</span>
                        </button>
                    </div>

                    @if($books->isEmpty())
                        <!-- EMPTY STATE -->
                        <div class="text-center py-16">
                            <div class="w-32 h-32 mx-auto mb-6 bg-gradient-to-br from-[#5EA38B]/10 to-[#DDAF54]/10 rounded-full flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Buku tidak ditemukan</h3>
                            <p class="text-gray-600 mb-6">Coba gunakan kata kunci lain atau hapus filter</p>
                            <a href="{{ route('katalog') }}" class="inline-block px-6 py-3 bg-[#5EA38B] text-white rounded-xl hover:bg-[#4A8F78] transition-colors font-semibold">
                                Lihat Semua Buku
                            </a>
                        </div>
                    @else
                        <!-- BOOKS GRID -->
                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            @foreach($books as $book)
                                <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-xl hover:border-[#5EA38B]/30 transition-all duration-300 group flex flex-col">
                                    <!-- BOOK COVER -->
                                    <div class="aspect-[3/4] bg-gradient-to-br from-[#5EA38B]/10 to-[#DDAF54]/10 flex items-center justify-center relative overflow-hidden">
                                        @if($book->cover)
                                            <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        @else
                                            <div class="text-center p-6">
                                                <svg class="w-16 h-16 mx-auto text-[#5EA38B]/30 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                </svg>
                                                <p class="text-sm text-gray-400 font-medium">{{ $book->title }}</p>
                                            </div>
                                        @endif

                                        <!-- STOCK BADGE -->
                                        <div class="absolute top-3 right-3">
                                            @if($book->stock_available > 0)
                                                <span class="px-3 py-1 bg-[#AFCF8B] text-white text-xs font-bold rounded-full shadow-lg">
                                                    Tersedia
                                                </span>
                                            @else
                                                <span class="px-3 py-1 bg-red-500 text-white text-xs font-bold rounded-full shadow-lg">
                                                    Habis
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- BOOK INFO -->
                                    <div class="p-4 flex-1 flex flex-col">
                                        <h3 class="font-bold text-gray-900 text-sm mb-1 line-clamp-2 group-hover:text-[#5EA38B] transition-colors">
                                            {{ $book->title }}
                                        </h3>
                                        <p class="text-xs text-gray-600 mb-1">{{ $book->author->name }}</p>
                                        
                                        <div class="flex items-center justify-between text-xs text-gray-500 mb-3">
                                            <span class="bg-[#F5E8C8]/50 px-2 py-1 rounded-lg">{{ $book->genre->name }}</span>
                                            <span>{{ $book->year }}</span>
                                        </div>

                                        <!-- ACTIONS -->
                                        <div class="mt-auto space-y-2">
                                            <a href="{{ route('book.detail', $book->id) }}" class="block w-full text-center px-4 py-2 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-colors text-sm font-semibold">
                                                Lihat Detail
                                            </a>

                                            @auth
                                                @if($book->stock_available > 0)
                                                    <a href="{{ route('borrow.create', $book->id) }}" class="block w-full text-center px-4 py-2 bg-[#5EA38B] text-white rounded-xl hover:bg-[#4A8F78] transition-colors text-sm font-semibold shadow-sm hover:shadow-md">
                                                        Pinjam Sekarang
                                                    </a>
                                                @else
                                                    <button disabled class="w-full px-4 py-2 bg-gray-300 text-gray-500 rounded-xl cursor-not-allowed text-sm font-semibold">
                                                        Stok Habis
                                                    </button>
                                                @endif
                                            @else
                                                <a href="{{ route('login') }}" class="block w-full text-center px-4 py-2 bg-[#DDAF54] text-white rounded-xl hover:bg-[#DDAF54]/90 transition-colors text-sm font-semibold">
                                                    Login untuk Meminjam
                                                </a>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- PAGINATION -->
                        <div class="mt-12">
                            {{ $books->appends(request()->except('page'))->links('vendor.pagination.custom') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
