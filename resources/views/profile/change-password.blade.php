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
                        Ganti Password
                    </h1>
                </div>
                <p class="text-gray-600 text-lg ml-9" style="font-family: 'Poppins', sans-serif;">
                    Pastikan akun Anda menggunakan password yang kuat untuk keamanan.
                </p>
            </div>

            <!-- Change Password Form -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                <section>
                    <header class="mb-6">
                        <h2 class="text-xl font-semibold text-[#1F2937] mb-2">
                            Perbarui Password
                        </h2>
                        <p class="text-sm text-gray-600">
                            Gunakan password yang panjang dan acak untuk menjaga keamanan akun Anda.
                        </p>
                    </header>

                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <label for="update_password_current_password" class="block text-sm font-medium text-gray-700 mb-2">Password Saat Ini</label>
                            <input id="update_password_current_password" name="current_password" type="password" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#5EA38B] focus:border-transparent transition-all duration-200" autocomplete="current-password" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div>
                            <label for="update_password_password" class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
                            <input id="update_password_password" name="password" type="password" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#5EA38B] focus:border-transparent transition-all duration-200" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password Baru</label>
                            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#5EA38B] focus:border-transparent transition-all duration-200" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4 pt-4">
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-[#5EA38B] text-white font-medium rounded-xl hover:bg-[#4A8F78] transition-all duration-300 shadow-sm hover:shadow-md">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                </svg>
                                Perbarui Password
                            </button>

                            <a href="{{ route('member.profile') }}" class="inline-flex items-center px-6 py-3 bg-gray-200 text-gray-700 font-medium rounded-xl hover:bg-gray-300 transition-all duration-300 shadow-sm hover:shadow-md">
                                Batal
                            </a>
                        </div>
                    </form>
                    
                    @if (session('status') === 'password-updated')
                        <script>
                            setTimeout(() => {
                                window.location.href = "{{ route('member.profile') }}";
                            }, 1500);
                        </script>
                    @endif
                </section>
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
