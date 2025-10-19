@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="grid grid-cols-12 gap-4 md:gap-8">

            <div class="col-span-12 md:col-span-6 bg-white rounded-2xl p-6 shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">
                            Hutang Belum Selesai
                        </h3>
                        <p class="text-4xl font-bold text-gray-900 mt-2">
                            @if ($bills)
                                {{ $bills->count() }}
                            @else
                                0
                            @endif
                        </p>
                        <span class="text-xs text-gray-400">Total tagihan yang harus dibayar</span>
                    </div>

                    <div class="flex-shrink-0 bg-red-100 text-red-600 p-4 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
                            <path d="M12 7.5a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
                            <path fill-rule="evenodd"
                                d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 14.625v-9.75ZM8.25 9.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM18.75 9a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V9.75a.75.75 0 0 0-.75-.75h-.008ZM4.5 9.75A.75.75 0 0 1 5.25 9h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H5.25a.75.75 0 0 1-.75-.75V9.75Z"
                                clip-rule="evenodd" />
                            <path
                                d="M2.25 18a.75.75 0 0 0 0 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 0 0-.75-.75H2.25Z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-6 bg-white rounded-2xl p-6 shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">
                            Tabungan Aktif
                        </h3>
                        <p class="text-4xl font-bold text-gray-900 mt-2">
                            @if ($savings)
                                {{ $savings->count() }}
                            @else
                                0
                            @endif
                        </p>
                        <span class="text-xs text-gray-400">Total celengan yang sedang diisi</span>
                    </div>

                    <div class="flex-shrink-0 bg-green-100 text-green-600 p-4 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
                            <path
                                d="M11.584 2.376a.75.75 0 0 1 .832 0l9 6a.75.75 0 1 1-.832 1.248L12 3.901 3.416 9.624a.75.75 0 0 1-.832-1.248l9-6Z" />
                            <path fill-rule="evenodd"
                                d="M20.25 10.332v9.918H21a.75.75 0 0 1 0 1.5H3a.75.75 0 0 1 0-1.5h.75v-9.918a.75.75 0 0 1 .634-.74A49.109 49.109 0 0 1 12 9c2.59 0 5.134.202 7.616.592a.75.75 0 0 1 .634.74Zm-7.5 2.418a.75.75 0 0 0-1.5 0v6.75a.75.75 0 0 0 1.5 0v-6.75Zm3-.75a.75.75 0 0 1 .75.75v6.75a.75.75 0 0 1-1.5 0v-6.75a.75.75 0 0 1 .75-.75ZM9 12.75a.75.75 0 0 0-1.5 0v6.75a.75.75 0 0 0 1.5 0v-6.75Z"
                                clip-rule="evenodd" />
                            <path d="M12 7.875a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z" />
                        </svg>
                    </div>
                </div>
            </div>

        </div>
        <!-- Daftar Hutang Section -->
        <section class="overflow-hidden rounded-2xl border border-gray-100 bg-white">
            <div class="border-b border-gray-100 px-8 py-6">
                <div class="flex items-center justify-between">
                    <div class="space-y-1">
                        <h2 class="text-xl font-semibold tracking-tight text-gray-900">Daftar Hutang</h2>
                        <p class="text-sm text-gray-500">
                            Total:
                            <span class="font-semibold text-indigo-600">
                                Rp @if ($bills)
                                    {{ number_format($bills->sum('amount'), '0', '.', '.') }}
                                @else
                                    0
                                @endif
                            </span>
                        </p>
                    </div>
                    <a href="{{ route('bills.index') }}"
                        class="group inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium text-indigo-600 transition-all hover:bg-indigo-50">
                        Lihat Semua
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="size-4 transition-transform group-hover:translate-x-0.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                </div>
            </div>

            <ul class="divide-y divide-gray-50">
                @forelse ($bills as $bill)
                    <li class="group px-8 py-5 transition-colors hover:bg-gray-50/50">
                        <div class="flex items-center justify-between">
                            <div class="flex-1 space-y-1.5">
                                <h3 class="font-medium text-gray-900">{{ $bill->name }}</h3>
                                <p class="flex items-center gap-1.5 text-xs text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-3.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    {{ $bill->created_at->format('d M Y, H:i') }}
                                </p>
                            </div>
                            <div class="flex items-center gap-6">
                                <span class="text-lg font-semibold text-gray-900">
                                    Rp {{ number_format($bill->amount, 0, ',', '.') }}
                                </span>
                                <form action="{{ route('bills.pay', $bill->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" data-tip="Lunaskan"
                                        class="tooltip rounded-lg p-2 text-gray-400 transition-all hover:bg-emerald-50 hover:text-emerald-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                @empty
                    <div class="py-16 text-center">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-base font-medium text-gray-900">Belum Ada Data</h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Sepertinya Anda belum membuat data apapun. Mulai sekarang!
                        </p>
                        <div class="mt-6">
                            <a href="{{-- route('nama.route.create') --}}"
                                class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-medium text-white transition-colors hover:bg-indigo-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                Buat Baru
                            </a>
                        </div>
                    </div>
                @endforelse
            </ul>
        </section>

        <!-- Tabungan Section -->
        <section class="overflow-hidden rounded-2xl border border-gray-100 bg-white">
            <div class="border-b border-gray-100 px-8 py-6">
                <div class="flex items-center justify-between">
                    <div class="space-y-1">
                        <h2 class="text-xl font-semibold tracking-tight text-gray-900">Tabungan Kamu</h2>
                        <p class="text-sm text-gray-500">Berikut adalah target tabungan yang masih aktif.</p>
                    </div>
                    <a href="{{ route('savings.index') }}"
                        class="group inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium text-indigo-600 transition-all hover:bg-indigo-50">
                        Lihat Semua
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="size-4 transition-transform group-hover:translate-x-0.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                </div>
            </div>

            <ul class="space-y-6 p-8">
                @forelse ($savings as $saving)
                    @php
                        $percentage = 0;
                        if ($saving->target_amount > 0) {
                            $percentage = ($saving->current_amount / $saving->target_amount) * 100;
                        }
                    @endphp
                    <li class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="font-medium text-gray-900">{{ $saving->goal_name }}</span>
                            <span
                                class="text-sm font-semibold text-indigo-600">{{ number_format($percentage, 0) }}%</span>
                        </div>
                        <p class="text-sm text-gray-500">
                            Rp {{ number_format($saving->current_amount, 0, ',', '.') }} /
                            Rp {{ number_format($saving->target_amount, 0, ',', '.') }}
                        </p>
                        <div class="relative h-2 w-full overflow-hidden rounded-full bg-gray-100">
                            <div class="h-full rounded-full bg-gradient-to-r from-indigo-500 to-indigo-600 transition-all duration-500"
                                style="width: {{ min($percentage, 100) }}%"></div>
                        </div>
                    </li>
                @empty
                    <div class="py-12 text-center">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-base font-medium text-gray-900">Belum Ada Data</h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Sepertinya Anda belum membuat data apapun. Mulai sekarang!
                        </p>
                        <div class="mt-6">
                            <a href="{{-- route('nama.route.create') --}}"
                                class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-medium text-white transition-colors hover:bg-indigo-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                Buat Baru
                            </a>
                        </div>
                    </div>
                @endforelse
            </ul>
        </section>
    </div>

    @push('scripts')
        <script></script>

        @if (session('success'))
            <script>
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif
    @endpush
@endsection
