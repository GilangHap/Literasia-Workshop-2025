<x-app-layout>
    <!-- HERO SECTION -->
    <section class="relative bg-gradient-to-br from-[#5EA38B] via-[#4A8F78] to-[#7EB396] overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 bg-cover bg-center opacity-95" style="background-image: url('{{ asset('img/perpustakaan.png') }}');"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#5EA38B]/90 to-[#4A8F78]/80"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
            <div class="text-center space-y-6">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight">
                    Selamat Datang di <span class="text-[#DDAF54]">Literasia</span>
                </h1>
                <p class="text-lg md:text-xl text-white/90 max-w-3xl mx-auto">
                    Temukan buku terbaik dan mulai perjalanan literasi Anda.
                </p>

                <!-- Search Bar -->
                <form action="{{ route('katalog') }}" method="GET" class="max-w-2xl mx-auto mt-8">
                    <div class="flex items-center bg-white rounded-2xl shadow-xl border-2 border-[#5EA38B]/20 overflow-hidden">
                        <input 
                            type="text" 
                            name="search" 
                            placeholder="Cari judul buku, penulis, atau genre..."
                            class="flex-1 px-6 py-4 text-gray-700 placeholder-gray-400 focus:outline-none border-0"
                            value="{{ request('search') }}"
                        >
                        <button 
                            type="submit"
                            class="px-8 py-4 bg-[#5EA38B] text-white font-semibold hover:bg-[#4A8F78] transition-all duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </button>
                    </div>
                </form>

                <!-- Quick Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto mt-12">
                    <div class="bg-white/90 backdrop-blur rounded-xl p-6 shadow-lg border border-white/20">
                        <div class="text-3xl font-bold text-[#5EA38B]">{{ \App\Models\Book::count() }}+</div>
                        <div class="text-sm text-gray-600 mt-1">Koleksi Buku</div>
                    </div>
                    <div class="bg-white/90 backdrop-blur rounded-xl p-6 shadow-lg border border-white/20">
                        <div class="text-3xl font-bold text-[#DDAF54]">{{ \App\Models\Genre::count() }}</div>
                        <div class="text-sm text-gray-600 mt-1">Kategori</div>
                    </div>
                    <div class="bg-white/90 backdrop-blur rounded-xl p-6 shadow-lg border border-white/20">
                        <div class="text-3xl font-bold text-[#7EB396]">{{ \App\Models\Member::count() }}</div>
                        <div class="text-sm text-gray-600 mt-1">Anggota</div>
                    </div>
                    <div class="bg-white/90 backdrop-blur rounded-xl p-6 shadow-lg border border-white/20">
                        <div class="text-3xl font-bold text-[#AFCF8B]">24/7</div>
                        <div class="text-sm text-gray-600 mt-1">Akses Digital</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BUKU TERBARU SECTION -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Buku Terbaru</h2>
                <a href="{{ route('katalog') }}" class="text-[#5EA38B] hover:text-[#4A8F78] font-semibold flex items-center space-x-2">
                    <span>Lihat Semua</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($latestBooks as $book)
                    <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-xl hover:border-[#5EA38B]/30 transition-all duration-300 group">
                        <div class="aspect-[3/4] bg-gradient-to-br from-[#5EA38B]/10 to-[#DDAF54]/10 flex items-center justify-center relative overflow-hidden">
                            @if($book->cover)
                                <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                            @else
                                <img src="img/cover_buku.png" alt="cover_buku" class="w-full h-full object-cover">
                            @endif
                            
                            <!-- Stock Badge -->
                            @if($book->stock_available > 0)
                                <span class="absolute top-2 right-2 bg-[#AFCF8B] text-white text-xs font-semibold px-3 py-1 rounded-full">
                                    Tersedia
                                </span>
                            @else
                                <span class="absolute top-2 right-2 bg-red-400 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                    Habis
                                </span>
                            @endif
                        </div>
                        
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 line-clamp-2 mb-2 group-hover:text-[#5EA38B] transition-colors">
                                <a href="{{ route('book.detail', $book->id) }}">{{ $book->title }}</a>
                            </h3>
                            <p class="text-sm text-gray-600 mb-1">{{ $book->author->name }}</p>
                            <p class="text-xs text-[#7EB396] font-medium">{{ $book->genre->name }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 text-gray-500">
                        Belum ada buku tersedia
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- BUKU POPULER SECTION -->
    <section class="py-16 bg-gradient-to-b from-white to-[#F5E8C8]/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Paling Banyak Dipinjam</h2>
                    <p class="text-gray-600 mt-2">Buku favorit anggota Literasia</p>
                </div>
                <a href="{{ route('katalog') }}?sort=popular" class="text-[#5EA38B] hover:text-[#4A8F78] font-semibold flex items-center space-x-2">
                    <span>Lihat Semua</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($popularBooks as $book)
                    <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-xl hover:border-[#DDAF54]/30 transition-all duration-300 group relative">
                        <!-- Popular Badge -->
                        @if($loop->index < 3)
                            <div class="absolute top-2 left-2 bg-[#DDAF54] text-white text-xs font-bold px-3 py-1 rounded-full z-10 flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span>Top {{ $loop->index + 1 }}</span>
                            </div>
                        @endif

                        <div class="aspect-[3/4] bg-gradient-to-br from-[#DDAF54]/10 to-[#7EB396]/10 flex items-center justify-center relative overflow-hidden">
                            @if($book->cover)
                                <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                            @else
                                <img src="img/cover_buku.png" alt="cover_buku" class="w-full h-full object-cover">
                                {{-- <svg class="w-20 h-20 text-[#DDAF54]/30" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                                </svg> --}}
                            @endif
                            
                            @if($book->stock_available > 0)
                                <span class="absolute bottom-2 right-2 bg-[#AFCF8B] text-white text-xs font-semibold px-3 py-1 rounded-full">
                                    Tersedia
                                </span>
                            @else
                                <span class="absolute bottom-2 right-2 bg-red-400 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                    Habis
                                </span>
                            @endif
                        </div>
                        
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 line-clamp-2 mb-2 group-hover:text-[#DDAF54] transition-colors">
                                <a href="{{ route('book.detail', $book->id) }}">{{ $book->title }}</a>
                            </h3>
                            <p class="text-sm text-gray-600 mb-1">{{ $book->author->name }}</p>
                            <div class="flex items-center justify-between">
                                <p class="text-xs text-[#7EB396] font-medium">{{ $book->genre->name }}</p>
                                <p class="text-xs text-gray-500">{{ $book->borrows_count }} peminjaman</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 text-gray-500">
                        Belum ada data peminjaman
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- KATEGORI/GENRE SECTION -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-3">Jelajah Kategori</h2>
                <p class="text-gray-600">Temukan buku sesuai minat Anda</p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @foreach($genres as $genre)
                    <a href="{{ route('katalog') }}?genre={{ $genre->id }}" 
                       class="bg-gradient-to-br from-[#5EA38B]/5 to-[#7EB396]/5 hover:from-[#5EA38B]/10 hover:to-[#7EB396]/10 border-2 border-[#5EA38B]/20 hover:border-[#5EA38B] rounded-2xl p-6 text-center transition-all duration-300 group shadow-sm hover:shadow-lg">
                        <div class="w-12 h-12 mx-auto bg-[#5EA38B]/10 group-hover:bg-[#5EA38B] rounded-xl flex items-center justify-center mb-3 transition-colors">
                            <svg class="w-6 h-6 text-[#5EA38B] group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900 group-hover:text-[#5EA38B] transition-colors text-sm">
                            {{ $genre->name }}
                        </h3>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- TENTANG LITERASIA SECTION -->
    <section class="py-16 bg-gradient-to-br from-[#F5E8C8]/30 to-[#AFCF8B]/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Tentang Literasia</h2>
                    <p class="text-gray-600 text-lg mb-6 leading-relaxed">
                        Literasia adalah platform perpustakaan digital yang memudahkan akses ke berbagai koleksi buku berkualitas. Kami berkomitmen untuk meningkatkan minat baca dan literasi di Indonesia.
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white rounded-xl p-6 shadow-md border border-[#5EA38B]/10">
                            <div class="w-12 h-12 bg-[#5EA38B]/10 rounded-xl flex items-center justify-center mb-3">
                                <svg class="w-6 h-6 text-[#5EA38B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-1">Koleksi Lengkap</h3>
                            <p class="text-sm text-gray-600">Ribuan buku dari berbagai kategori</p>
                        </div>

                        <div class="bg-white rounded-xl p-6 shadow-md border border-[#DDAF54]/10">
                            <div class="w-12 h-12 bg-[#DDAF54]/10 rounded-xl flex items-center justify-center mb-3">
                                <svg class="w-6 h-6 text-[#DDAF54]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-1">Akses Mudah</h3>
                            <p class="text-sm text-gray-600">Pinjam buku dengan cepat</p>
                        </div>

                        <div class="bg-white rounded-xl p-6 shadow-md border border-[#7EB396]/10">
                            <div class="w-12 h-12 bg-[#7EB396]/10 rounded-xl flex items-center justify-center mb-3">
                                <svg class="w-6 h-6 text-[#7EB396]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-1">Peminjaman Cepat</h3>
                            <p class="text-sm text-gray-600">Proses otomatis & efisien</p>
                        </div>

                        <div class="bg-white rounded-xl p-6 shadow-md border border-[#AFCF8B]/10">
                            <div class="w-12 h-12 bg-[#AFCF8B]/10 rounded-xl flex items-center justify-center mb-3">
                                <svg class="w-6 h-6 text-[#AFCF8B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-1">Dashboard Anggota</h3>
                            <p class="text-sm text-gray-600">Kelola riwayat peminjaman</p>
                        </div>
                    </div>
                </div>

                <div class="hidden md:block">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#5EA38B]/20 to-[#DDAF54]/20 rounded-3xl transform rotate-3"></div>
                        <div class="relative bg-white rounded-3xl p-8 shadow-2xl border-2 border-[#5EA38B]/20">
                            <img src="{{ asset('img/logo_literasia.png') }}" alt="Logo Literasia" class="w-full h-auto p-20">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CARA MEMINJAM BUKU SECTION -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-3">Cara Meminjam Buku</h2>
                <p class="text-gray-600">Proses mudah dan cepat dalam 4 langkah</p>
            </div>

            <div class="grid md:grid-cols-4 gap-6">
                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto bg-gradient-to-br from-[#5EA38B] to-[#7EB396] rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition-transform">
                        <span class="text-3xl font-bold text-white">1</span>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Daftar Akun</h3>
                    <p class="text-sm text-gray-600">Buat akun gratis di Literasia</p>
                </div>

                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto bg-gradient-to-br from-[#7EB396] to-[#DDAF54] rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition-transform">
                        <span class="text-3xl font-bold text-white">2</span>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Cari Buku</h3>
                    <p class="text-sm text-gray-600">Temukan buku yang Anda inginkan</p>
                </div>

                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto bg-gradient-to-br from-[#DDAF54] to-[#AFCF8B] rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition-transform">
                        <span class="text-3xl font-bold text-white">3</span>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Klik Pinjam</h3>
                    <p class="text-sm text-gray-600">Ajukan peminjaman secara online</p>
                </div>

                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto bg-gradient-to-br from-[#AFCF8B] to-[#5EA38B] rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition-transform">
                        <span class="text-3xl font-bold text-white">4</span>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Ambil Buku</h3>
                    <p class="text-sm text-gray-600">Konfirmasi & ambil di perpustakaan</p>
                </div>
            </div>
            @guest    
            <div class="text-center mt-12">
                <a href="{{ route('register') }}" class="inline-block px-8 py-4 bg-[#5EA38B] text-white font-semibold rounded-xl shadow-lg hover:bg-[#4A8F78] hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    Daftar Sekarang
                </a>
            </div>
            @endguest
            @auth
            <div class="text-center mt-12">
                <a href="{{ route('katalog') }}" class="inline-block px-8 py-4 bg-[#5EA38B] text-white font-semibold rounded-xl shadow-lg hover:bg-[#4A8F78] hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    Pinjam Buku
                </a>
            </div>
            @endauth
        </div>
    </section>
</x-app-layout>
