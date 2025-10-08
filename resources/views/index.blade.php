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
                @foreach ($bills as $bill)
                    <li
                        class="group flex items-center justify-between px-6 py-4 transition-all duration-300 hover:bg-indigo-50">
                        <div class="flex flex-col">
                            <h3 class="font-medium text-gray-900">Galon Aqua</h3>
                            <p class="mt-1 flex items-center gap-1.5 text-xs text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-3.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                22 Desember 2024
                            </p>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="text-base font-semibold text-gray-800">Rp 22.000</span>
                            <div class="flex items-center gap-3">
                                <button type="button" data-tip="Lunaskan" href="#"
                                    class="tooltip cursor-pointer text-gray-400 transition duration-300 hover:text-emerald-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </li>
                @endforeach
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
