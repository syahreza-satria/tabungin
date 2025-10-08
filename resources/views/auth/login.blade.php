@extends('layouts.authentication')

@section('content')
    @push('styles')
        <style>
            /* Optional: Custom scrollbar styling for a cleaner look */
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
        {{-- Bagian Kiri (Form Login) --}}
        <section class="flex flex-1 items-center justify-center p-6 lg:p-12">
            <div class="mx-auto w-full max-w-md space-y-6">
                <h1 class="text-3xl font-semibold text-gray-800">Welcome Back 👋</h1>
                <p class="text-base text-gray-600">
                    Hari yang baru telah tiba. Inilah harinya untuk mengatur pemasukan, pengeluaran, dan tabungan
                    kamu!
                </p>

                <div class="flex w-full flex-col">
                    <form action="" method="POST" class="space-y-5">
                        @csrf
                        {{-- Input Email --}}
                        <div>
                            <label for="email" class="mb-2 block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" placeholder="johndoe@gmail.com"
                                class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-gray-800 placeholder-gray-400 outline-none transition duration-300 ease-in-out focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                required>
                        </div>

                        {{-- Input Password --}}
                        <div class="relative">
                            <label for="password" class="mb-2 block text-sm font-medium text-gray-700">Password</label>
                            <div class="relative">
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 pr-10 text-gray-800 placeholder-gray-400 outline-none transition duration-300 ease-in-out focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                    required>
                                <button type="button"
                                    onclick="togglePassword('password', 'eye-icon-password', 'eye-slash-icon-password')"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 focus:outline-none">
                                    <svg id="eye-icon-password" xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 hover:text-indigo-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <svg id="eye-slash-icon-password" xmlns="http://www.w3.org/2000/svg"
                                        class="hidden h-5 w-5 hover:text-indigo-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- Link Lupa Password --}}
                        <div class="text-right">
                            <a href="#"
                                class="text-sm font-medium text-indigo-600 transition duration-300 hover:text-indigo-800 hover:underline">Lupa
                                Password?</a>
                        </div>

                        {{-- Tombol Masuk --}}
                        <button type="submit"
                            class="w-full rounded-lg bg-indigo-600 py-2.5 font-semibold text-white shadow-md transition duration-300 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Masuk
                        </button>
                    </form>

                    <div class="my-6 flex items-center">
                        <hr class="flex-grow border-t border-gray-300">
                        <span class="px-3 text-sm text-gray-500">Atau</span>
                        <hr class="flex-grow border-t border-gray-300">
                    </div>

                    <a href="#"
                        class="flex w-full items-center justify-center space-x-3 rounded-lg border border-gray-300 bg-white px-4 py-2.5 font-medium text-gray-700 shadow-sm transition duration-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        {{-- Google SVG Icon --}}
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                            xmlns:xlink="http://www.w3.org/1999/xlink" class="size-6">
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
                        <span>Sign in with Google</span>
                    </a>

                    {{-- Link Daftar --}}
                    <p class="mt-8 text-center text-sm text-gray-600">Belum memiliki akun?
                        <a href="{{ route('auth.registerForm') }}"
                            class="font-medium text-indigo-600 transition duration-300 hover:text-indigo-800 hover:underline">Daftar
                            Sekarang</a>
                    </p>
                </div>
            </div>
        </section>

        {{-- Bagian Kanan (Gambar Ilustrasi) --}}
        <section class="relative hidden flex-1 lg:flex">
            <img src="https://images.unsplash.com/photo-1593672715438-d88a70629abe?q=80&w=774&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="Illustration" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-indigo-800/60 to-transparent"></div>
            <div class="absolute bottom-6 left-6 text-white">
                <h3 class="text-xl font-semibold">Kelola Keuangan dengan Mudah</h3>
                <p class="mt-1 text-sm text-gray-200">TabungIn membantu Anda mencapai tujuan finansial Anda.</p>
            </div>
        </section>
    </div>
    @push('scripts')
        <script>
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
        </script>
    @endpush
@endsection
