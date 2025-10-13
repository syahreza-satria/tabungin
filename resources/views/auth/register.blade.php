@extends('layouts.authentication')

@section('content')
    @push('styles')
        <style>
            body::-webkit-scrollbar {
                width: 8px;
            }

            body::-webkit-scrollbar-track {
                background: #f1f1f1;
            }

            body::-webkit-scrollbar-thumb {
                background: #c7d2fe;
                border-radius: 10px;
            }

            body::-webkit-scrollbar-thumb:hover {
                background: #a5b4fc;
            }
        </style>
    @endpush

    <div
        class="mx-auto flex w-full max-w-7xl flex-col overflow-hidden rounded-2xl bg-white shadow-lg lg:h-[calc(100vh-4rem)] lg:flex-row">
        {{-- Bagian Kiri (Form Register) --}}
        <section class="flex flex-1 items-center justify-center p-6 lg:p-12">
            <div class="mx-auto w-full max-w-md space-y-6">
                <h1 class="text-3xl font-semibold text-gray-800">Buat Akun Baru ✨</h1>
                <p class="text-base text-gray-600">
                    Mulai perjalanan finansialmu hari ini. Cukup beberapa langkah untuk memulai!
                </p>

                <div class="flex w-full flex-col">
                    <form action="" method="POST" class="space-y-5">
                        @csrf
                        {{-- Input Nama Lengkap --}}
                        <div>
                            <label for="name" class="mb-2 block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="name" id="name" placeholder="John Doe"
                                class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-gray-800 placeholder-gray-400 outline-none transition duration-300 ease-in-out focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                required>
                        </div>

                        {{-- Input Nama Lengkap --}}
                        <div>
                            <label for="username" class="mb-2 block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" name="username" id="username" placeholder="NoobMaster69"
                                class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-gray-800 placeholder-gray-400 outline-none transition duration-300 ease-in-out focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                required>
                        </div>

                        {{-- Input Email --}}
                        <div>
                            <label for="email" class="mb-2 block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" placeholder="johndoe@gmail.com"
                                class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-gray-800 placeholder-gray-400 outline-none transition duration-300 ease-in-out focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                required>
                        </div>

                        {{-- Input Password dengan Strength Meter --}}
                        <div>
                            <label for="password" class="mb-2 block text-sm font-medium text-gray-700">Password</label>
                            <div class="relative">
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 pr-10 text-gray-800 placeholder-gray-400 outline-none transition duration-300 ease-in-out focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                    required>
                                <button type="button"
                                    onclick="togglePassword('password', 'eye-icon-password', 'eye-slash-icon-password')"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 focus:outline-none">
                                    {{-- Ikon Mata (Visible) --}}
                                    <svg id="eye-icon-password" xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 hover:text-indigo-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    {{-- Ikon Mata (Hidden) --}}
                                    <svg id="eye-slash-icon-password" xmlns="http://www.w3.org/2000/svg"
                                        class="hidden h-5 w-5 hover:text-indigo-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                    </svg>
                                </button>
                            </div>
                            {{-- Indikator Kekuatan Password --}}
                            <div class="mt-2 flex items-center gap-x-2">
                                <div id="strength-bar-1" class="h-1.5 w-1/4 rounded-full bg-gray-200"></div>
                                <div id="strength-bar-2" class="h-1.5 w-1/4 rounded-full bg-gray-200"></div>
                                <div id="strength-bar-3" class="h-1.5 w-1/4 rounded-full bg-gray-200"></div>
                                <div id="strength-bar-4" class="h-1.5 w-1/4 rounded-full bg-gray-200"></div>
                            </div>
                            <p id="strength-text" class="mt-1 text-xs text-gray-500"></p>
                        </div>

                        {{-- Input Konfirmasi Password dengan Validasi Real-time --}}
                        <div>
                            <label for="password_confirmation"
                                class="mb-2 block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                            <div class="relative">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    placeholder="••••••••"
                                    class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 pr-10 text-gray-800 placeholder-gray-400 outline-none transition duration-300 ease-in-out focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                    required>
                                <button type="button"
                                    onclick="togglePassword('password_confirmation', 'eye-icon-confirm', 'eye-slash-icon-confirm')"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 focus:outline-none">
                                    {{-- Ikon Mata (Visible) --}}
                                    <svg id="eye-icon-confirm" xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 hover:text-indigo-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    {{-- Ikon Mata (Hidden) --}}
                                    <svg id="eye-slash-icon-confirm" xmlns="http://www.w3.org/2000/svg"
                                        class="hidden h-5 w-5 hover:text-indigo-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                    </svg>
                                </button>
                            </div>
                            {{-- Pesan Error Jika Password Tidak Cocok --}}
                            <p id="password-mismatch-error" class="mt-1 hidden text-xs text-red-500">Password tidak cocok.
                            </p>
                        </div>

                        {{-- Tombol Daftar --}}
                        <button type="submit"
                            class="w-full rounded-lg bg-indigo-600 py-2.5 font-semibold text-white shadow-md transition duration-300 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Daftar
                        </button>
                    </form>

                    {{-- Divider "Atau" --}}
                    <div class="my-6 flex items-center">
                        <hr class="flex-grow border-t border-gray-300">
                        <span class="px-3 text-sm text-gray-500">Atau</span>
                        <hr class="flex-grow border-t border-gray-300">
                    </div>

                    {{-- Tombol Sign in with Google --}}
                    <a href="#"
                        class="flex w-full items-center justify-center space-x-3 rounded-lg border border-gray-300 bg-white px-4 py-2.5 font-medium text-gray-700 shadow-sm transition duration-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="size-6">
                            <path fill="#EA4335"
                                d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z">
                            </path>
                            <path fill="#4285F4"
                                d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z">
                            </path>
                            <path fill="#FBBC05"
                                d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z">
                            </path>
                            <path fill="#34A853"
                                d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z">
                            </path>
                            <path fill="none" d="M0 0h48v48H0z"></path>
                        </svg>
                        <span>Daftar dengan Google</span>
                    </a>

                    {{-- Link Masuk --}}
                    <p class="mt-8 text-center text-sm text-gray-600">Sudah punya akun?
                        <a href="{{ route('login') }}"
                            class="font-medium text-indigo-600 transition duration-300 hover:text-indigo-800 hover:underline">Masuk
                            di sini</a>
                    </p>
                </div>
            </div>
        </section>

        {{-- Bagian Kanan (Gambar Ilustrasi) --}}
        <section class="relative hidden flex-1 lg:flex">
            <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=1470&auto=format&fit=crop"
                alt="Illustration of a team working" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-indigo-800/60 to-transparent"></div>
            <div class="absolute bottom-10 left-10 text-white">
                <h3 class="text-2xl font-semibold leading-tight">Satu Langkah Menuju Kebebasan Finansial</h3>
                <p class="mt-2 max-w-md text-base text-gray-200">TabungIn membantu Anda melacak, menabung, dan mencapai
                    setiap tujuan finansial dengan lebih cerdas.</p>
            </div>
        </section>
    </div>

    @push('scripts')
        <script>
            // Fungsi untuk toggle visibility password (tetap sama)
            function togglePassword(fieldId, eyeIconId, eyeSlashIconId) {
                const passwordField = document.getElementById(fieldId);
                const eyeIcon = document.getElementById(eyeIconId);
                const eyeSlashIcon = document.getElementById(eyeSlashIconId);

                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    eyeIcon.classList.add('hidden');
                    eyeSlashIcon.classList.remove('hidden');
                } else {
                    passwordField.type = 'password';
                    eyeIcon.classList.remove('hidden');
                    eyeSlashIcon.classList.add('hidden');
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                const passwordInput = document.getElementById('password');
                const confirmPasswordInput = document.getElementById('password_confirmation');
                const mismatchError = document.getElementById('password-mismatch-error');
                const strengthText = document.getElementById('strength-text');
                const strengthBars = [
                    document.getElementById('strength-bar-1'),
                    document.getElementById('strength-bar-2'),
                    document.getElementById('strength-bar-3'),
                    document.getElementById('strength-bar-4'),
                ];

                // Fungsi untuk validasi kecocokan password
                function validatePasswordMatch() {
                    if (confirmPasswordInput.value.length === 0) {
                        mismatchError.classList.add('hidden');
                        confirmPasswordInput.classList.remove('border-red-500', 'focus:border-red-500',
                            'focus:ring-red-500');
                        confirmPasswordInput.classList.remove('border-green-500', 'focus:border-green-500',
                            'focus:ring-green-500');
                        return;
                    }

                    if (passwordInput.value === confirmPasswordInput.value) {
                        mismatchError.classList.add('hidden');
                        confirmPasswordInput.classList.remove('border-red-500', 'focus:border-red-500',
                            'focus:ring-red-500');
                        confirmPasswordInput.classList.add('border-green-500', 'focus:border-green-500',
                            'focus:ring-green-500');
                    } else {
                        mismatchError.classList.remove('hidden');
                        confirmPasswordInput.classList.remove('border-green-500', 'focus:border-green-500',
                            'focus:ring-green-500');
                        confirmPasswordInput.classList.add('border-red-500', 'focus:border-red-500',
                            'focus:ring-red-500');
                    }
                }

                // Fungsi untuk cek kekuatan password
                function checkPasswordStrength() {
                    const pass = passwordInput.value;
                    let score = 0;
                    if (pass.length >= 8) score++;
                    if (/[A-Z]/.test(pass)) score++;
                    if (/[a-z]/.test(pass)) score++;
                    if (/[0-9]/.test(pass)) score++;
                    if (/[^A-Za-z0-9]/.test(pass)) score++; // Special character

                    // Reset bars
                    strengthBars.forEach(bar => bar.className = 'h-1.5 w-1/4 rounded-full bg-gray-200');

                    if (pass.length === 0) {
                        strengthText.textContent = '';
                        return;
                    }

                    if (score <= 2) {
                        strengthBars.slice(0, 1).forEach(bar => bar.className = 'h-1.5 w-1/4 rounded-full bg-red-500');
                        strengthText.textContent = 'Kekuatan: Lemah';
                        strengthText.className = 'mt-1 text-xs text-red-500';
                    } else if (score <= 4) {
                        strengthBars.slice(0, 3).forEach(bar => bar.className =
                            'h-1.5 w-1/4 rounded-full bg-yellow-500');
                        strengthText.textContent = 'Kekuatan: Sedang';
                        strengthText.className = 'mt-1 text-xs text-yellow-600';
                    } else {
                        strengthBars.forEach(bar => bar.className = 'h-1.5 w-1/4 rounded-full bg-green-500');
                        strengthText.textContent = 'Kekuatan: Kuat';
                        strengthText.className = 'mt-1 text-xs text-green-600';
                    }
                }

                // Tambahkan event listeners
                passwordInput.addEventListener('input', checkPasswordStrength);
                passwordInput.addEventListener('input', validatePasswordMatch);
                confirmPasswordInput.addEventListener('input', validatePasswordMatch);
            });
        </script>
    @endpush
@endsection
