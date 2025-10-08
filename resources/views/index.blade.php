@extends('layouts.app')

@section('content')
    <div class="space-y-8">

        <section class="overflow-hidden rounded-xl bg-white shadow-md">
            <div class="flex items-center justify-between border-b border-gray-200 p-6">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Daftar Hutang</h2>
                    <p class="text-sm font-medium text-indigo-600">Total: Rp 55.000</p>
                </div>
                <a href="#" class="flex items-center gap-2 text-sm font-medium text-indigo-600 hover:text-indigo-800">
                    Lihat Semua
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
            </div>

            <ul class="divide-y divide-gray-200">
                <li
                    class="group flex items-center justify-between px-6 py-4 transition-all duration-300 hover:bg-indigo-50">
                    <div class="flex flex-col">
                        <h3 class="font-medium text-gray-900">Galon Aqua</h3>
                        <p class="mt-1 flex items-center gap-1.5 text-xs text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-3.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            22 Desember 2024
                        </p>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-base font-semibold text-gray-800">Rp 22.000</span>
                        <div class="flex items-center gap-3">
                            <a href="#" class="text-gray-400 transition duration-300 hover:text-amber-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 transition duration-300 hover:text-rose-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </li>
                <li
                    class="group flex items-center justify-between px-6 py-4 transition-all duration-300 hover:bg-indigo-50">
                    <div class="flex flex-col">
                        <h3 class="font-medium text-gray-900">Uang Bensin</h3>
                        <p class="mt-1 flex items-center gap-1.5 text-xs text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-3.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            15 Oktober 2025
                        </p>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-base font-semibold text-gray-800">Rp 33.000</span>
                        <div class="flex items-center gap-3">
                            <a href="#" class="text-gray-400 transition duration-300 hover:text-amber-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 transition duration-300 hover:text-rose-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </section>

        <section class="overflow-hidden rounded-xl bg-white shadow-md">
            <div class="flex items-center justify-between border-b border-gray-200 p-6">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Tabungan Kamu</h2>
                    <p class="text-sm text-gray-500">Berikut adalah target tabungan yang masih aktif.</p>
                </div>
                <a href="#"
                    class="flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition-all hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path
                            d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                    </svg>
                    Tambah Baru
                </a>
            </div>

            <div class="space-y-6 p-6">
                <div>
                    <div class="mb-2 flex justify-between">
                        <span class="text-base font-medium text-gray-700">Membeli Laptop Baru</span>
                        <span class="text-sm font-medium text-indigo-700">75%</span>
                    </div>
                    <div class="w-full rounded-full bg-gray-200">
                        <div class="h-2.5 rounded-full bg-indigo-600" style="width: 75%"></div>
                    </div>
                    <p class="mt-2 text-right text-sm text-gray-500">Rp 7.500.000 / Rp 10.000.000</p>
                </div>

                <div>
                    <div class="mb-2 flex justify-between">
                        <span class="text-base font-medium text-gray-700">Liburan ke Bali</span>
                        <span class="text-sm font-medium text-emerald-700">100%</span>
                    </div>
                    <div class="w-full rounded-full bg-gray-200">
                        <div class="h-2.5 rounded-full bg-emerald-500" style="width: 100%"></div>
                    </div>
                    <p class="mt-2 text-right text-sm text-gray-500">Rp 5.000.000 / Rp 5.000.000 (Tercapai!)</p>
                </div>
            </div>
        </section>

    </div>
@endsection
