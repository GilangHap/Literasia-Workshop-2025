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
                <a href="{{ route('katalog') }}" class="text-gray-500 hover:text-[#5EA38B] transition-colors">
                    Katalog
                </a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('book.detail', $book->id) }}" class="text-gray-500 hover:text-[#5EA38B] transition-colors">
                    Detail Buku
                </a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-[#5EA38B] font-medium">Peminjaman</span>
            </nav>
        </div>
    </section>

    <!-- HEADER -->
    <section class="bg-gradient-to-br from-[#5EA38B]/5 to-[#AFCF8B]/5 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-[#5EA38B] to-[#7EB396] rounded-2xl shadow-lg mb-4">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-3">Peminjaman Buku</h1>
            <p class="text-lg text-gray-600">Lengkapi informasi berikut untuk meminjam buku</p>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <section class="py-12 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if(session('error'))
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-red-700 font-semibold">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <form action="{{ route('borrow.store', $book->id) }}" method="POST">
                @csrf
                
                <div class="grid md:grid-cols-2 gap-8 mb-8">
                    
                    <!-- BOOK INFORMATION CARD -->
                    <div class="bg-gradient-to-br from-[#F5E8C8]/20 to-white rounded-2xl shadow-lg border-2 border-[#5EA38B]/20 p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 text-[#5EA38B] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            Informasi Buku
                        </h2>

                        <div class="flex gap-4 mb-6">
                            <div class="w-24 h-32 bg-gradient-to-br from-[#5EA38B]/10 to-[#DDAF54]/10 rounded-xl overflow-hidden shadow-md flex-shrink-0">
                                @if($book->cover)
                                    <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-12 h-12 text-[#5EA38B]/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <div class="flex-1">
                                <h3 class="font-bold text-gray-900 text-lg mb-2 line-clamp-2">{{ $book->title }}</h3>
                                <div class="space-y-1 text-sm">
                                    <p class="text-gray-600">
                                        <span class="font-semibold">Penulis:</span> {{ $book->author->name }}
                                    </p>
                                    <p class="text-gray-600">
                                        <span class="font-semibold">Genre:</span> {{ $book->genre->name }}
                                    </p>
                                    <p class="text-gray-600">
                                        <span class="font-semibold">Tahun:</span> {{ $book->year }}
                                    </p>
                                    <p class="text-gray-600">
                                        <span class="font-semibold">ISBN:</span> {{ $book->isbn }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-[#AFCF8B]/20 to-[#7EB396]/20 rounded-xl border border-[#AFCF8B]/30">
                            <span class="text-sm font-semibold text-gray-700">Stok Tersedia</span>
                            <span class="text-2xl font-bold text-[#5EA38B]">{{ $book->stock_available }}/{{ $book->stock_total }}</span>
                        </div>
                    </div>

                    <!-- BORROWER INFORMATION CARD -->
                    <div class="bg-gradient-to-br from-[#DDAF54]/10 to-white rounded-2xl shadow-lg border-2 border-[#DDAF54]/20 p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 text-[#DDAF54] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Informasi Peminjam
                        </h2>

                        <div class="space-y-4">
                            <div class="p-4 bg-white rounded-xl border border-gray-200">
                                <label class="text-sm font-semibold text-gray-600 block mb-1">Nama Lengkap</label>
                                <p class="text-gray-900 font-bold">{{ $user->name }}</p>
                            </div>

                            <div class="p-4 bg-white rounded-xl border border-gray-200">
                                <label class="text-sm font-semibold text-gray-600 block mb-1">Email</label>
                                <p class="text-gray-900 font-bold">{{ $user->email }}</p>
                            </div>

                            <div class="p-4 bg-white rounded-xl border border-gray-200">
                                <label class="text-sm font-semibold text-gray-600 block mb-1">NIM</label>
                                <p class="text-gray-900 font-bold">{{ $member->nim }}</p>
                            </div>

                            <div class="p-4 bg-white rounded-xl border border-gray-200">
                                <label class="text-sm font-semibold text-gray-600 block mb-1">No. Telepon</label>
                                <p class="text-gray-900 font-bold">{{ $member->phone ?? '-' }}</p>
                            </div>

                            <div class="flex items-center p-4 bg-gradient-to-r from-[#5EA38B]/10 to-[#7EB396]/10 rounded-xl border border-[#5EA38B]/20">
                                <svg class="w-5 h-5 text-[#5EA38B] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-sm font-semibold text-gray-700">Status: <span class="text-[#5EA38B]">{{ ucfirst($member->status) }}</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BORROW DETAILS FORM -->
                <div class="bg-gradient-to-br from-white to-[#F5E8C8]/10 rounded-2xl shadow-lg border-2 border-gray-200 p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 text-[#5EA38B] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Detail Peminjaman
                    </h2>

                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                Tanggal Pinjam
                            </label>
                            <input 
                                type="text" 
                                value="{{ $borrowDate->format('d F Y') }}" 
                                disabled
                                class="w-full px-4 py-3 bg-gray-100 border-2 border-gray-200 rounded-xl text-gray-700 font-semibold cursor-not-allowed"
                            >
                            <p class="text-xs text-gray-500 mt-1">Tanggal peminjaman otomatis hari ini</p>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                Tanggal Jatuh Tempo
                            </label>
                            <input 
                                type="text" 
                                value="{{ $dueDate->format('d F Y') }}" 
                                disabled
                                class="w-full px-4 py-3 bg-gradient-to-r from-[#DDAF54]/10 to-[#7EB396]/10 border-2 border-[#DDAF54]/30 rounded-xl text-gray-900 font-bold cursor-not-allowed"
                            >
                            <p class="text-xs text-gray-500 mt-1">Buku harus dikembalikan dalam 7 hari</p>
                        </div>
                    </div>
                </div>

                <!-- IMPORTANT NOTICE -->
                <div class="bg-gradient-to-r from-[#7EB396]/10 to-[#AFCF8B]/10 border-l-4 border-[#5EA38B] rounded-xl p-6 mb-8">
                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-[#5EA38B] mr-3 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-2">Perhatian Penting:</h3>
                            <ul class="space-y-1 text-sm text-gray-700">
                                <li>✓ Buku harus dikembalikan sebelum tanggal jatuh tempo</li>
                                <li>✓ Keterlambatan pengembalian akan dikenakan sanksi</li>
                                <li>✓ Jaga kondisi buku dengan baik selama peminjaman</li>
                                <li>✓ Pastikan data yang tertera sudah benar sebelum konfirmasi</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- ACTION BUTTONS -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <button 
                        type="submit"
                        class="flex-1 inline-flex items-center justify-center px-8 py-4 bg-[#5EA38B] text-white font-bold rounded-2xl shadow-lg hover:bg-[#4A8F78] hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1"
                    >
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Konfirmasi Peminjaman
                    </button>

                    <a 
                        href="{{ route('book.detail', $book->id) }}"
                        class="inline-flex items-center justify-center px-8 py-4 bg-white border-2 border-gray-300 text-gray-700 font-bold rounded-2xl hover:bg-gray-50 transition-all duration-300 shadow-sm"
                    >
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
