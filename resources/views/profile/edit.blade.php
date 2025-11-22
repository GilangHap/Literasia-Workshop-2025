<x-app-layout>
    <div class="min-h-screen bg-[#F5E8C8] py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex items-center space-x-3 mb-4">
                    <a href="{{ route('member.profile') }}" class="text-[#5EA38B] hover:text-[#4A8F78] transition-colors duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </a>
                    <h1 class="text-3xl md:text-4xl font-bold text-[#1F2937]" style="font-family: 'Poppins', sans-serif;">
                        Edit Profil
                    </h1>
                </div>
                <p class="text-gray-600 text-lg ml-9" style="font-family: 'Poppins', sans-serif;">
                    Perbarui informasi akun dan data keanggotaan Anda.
                </p>
            </div>

            <!-- Single Form for Both Account and Member Data -->
            <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                @csrf
                @method('patch')
                
                <!-- Account Information Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#5EA38B] to-[#7EB396] rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-[#1F2937]">Informasi Akun</h2>
                            <p class="text-sm text-gray-600">Data login dan email Anda</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input id="name" name="name" type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#5EA38B] focus:border-transparent transition-all duration-200" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input id="email" name="email" type="email" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#5EA38B] focus:border-transparent transition-all duration-200" value="{{ old('email', $user->email) }}" required autocomplete="username" />
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div class="mt-4 p-4 bg-yellow-50 border border-yellow-200 rounded-xl">
                            <p class="text-sm text-yellow-800">
                                Email Anda belum diverifikasi.
                                <button form="send-verification" class="underline text-sm text-yellow-900 hover:text-yellow-700 font-medium">
                                    Klik di sini untuk mengirim ulang email verifikasi.
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-700">
                                    Link verifikasi baru telah dikirim ke alamat email Anda.
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
                
                <!-- Member Information Card -->
                @if($member)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#DDAF54] to-[#7EB396] rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-[#1F2937]">Informasi Anggota</h2>
                            <p class="text-sm text-gray-600">Data keanggotaan perpustakaan</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nim" class="block text-sm font-medium text-gray-700 mb-2">NIM / NIS</label>
                            <input id="nim" name="nim" type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#5EA38B] focus:border-transparent transition-all duration-200" value="{{ old('nim', $member->nim) }}" required />
                            @error('nim')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor HP</label>
                            <input id="phone" name="phone" type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#5EA38B] focus:border-transparent transition-all duration-200" value="{{ old('phone', $member->phone) }}" placeholder="Opsional" />
                            @error('phone')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                @endif

                <!-- Action Buttons -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                    <div class="flex flex-wrap items-center gap-4">
                        <button type="submit" class="inline-flex items-center px-8 py-3.5 bg-gradient-to-r from-[#5EA38B] to-[#4A8F78] text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Simpan Semua Perubahan
                        </button>

                        <a href="{{ route('member.profile') }}" class="inline-flex items-center px-8 py-3.5 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Batal
                        </a>

                        @if (session('status') === 'profile-updated')
                            <div class="flex items-center px-4 py-2 bg-green-50 border border-green-200 rounded-xl">
                                <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-sm text-green-700 font-medium">Perubahan berhasil disimpan!</span>
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Verification Form (Hidden) -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</x-app-layout>
