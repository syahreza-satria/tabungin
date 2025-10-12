@extends('layouts.app')

@section('content')
    <div class="space-y-8">
        <section class="overflow-hidden rounded-xl bg-white shadow-md">
            <div class="flex items-center justify-between border-b border-gray-200 p-6">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Daftar Hutang</h2>
                    <p class="text-sm font-medium text-neutral-600">Total: <strong class="text-indigo-500">Rp @if ($bills)
                                {{ number_format($bills->sum('amount'), '0', '.', '.') }}
                            @else
                                0
                            @endif
                        </strong>
                    </p>
                </div>
                <a href="{{ route('bills.index') }}"
                    class="flex items-center gap-2 text-sm font-medium text-indigo-600 hover:text-indigo-800">
                    Lihat Semua
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
            </div>
            <ul class="divide-y divide-gray-200">
                @forelse ($bills as $bill)
                    <li
                        class="group flex items-center justify-between px-6 py-4 transition-all duration-300 hover:bg-indigo-50">
                        <div class="flex flex-col">
                            <h3 class="font-medium text-gray-900">{{ $bill->name }}</h3>
                            <p class="mt-1 flex items-center gap-1.5 text-xs text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-3.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                {{ $bill->created_at->format('d M Y, H:i') }}
                            </p>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="text-base font-semibold text-gray-800">Rp
                                {{ number_format($bill->amount, 0, ',', '.') }}</span>
                            <div class="flex items-center gap-3">
                                <form action="{{ route('bills.pay', $bill->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" data-tip="Lunaskan"
                                        class="tooltip cursor-pointer text-gray-400 transition duration-300 hover:text-emerald-500">
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
                    <div class="my-8 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 10h.01M15 10h.01M9 14h6" />
                        </svg>

                        <h3 class="mt-2 text-lg font-medium text-gray-900">
                            Belum Ada Data
                        </h3>

                        <p class="mt-1 text-sm text-gray-500">
                            Sepertinya Anda belum membuat data apapun. Mulai sekarang!
                        </p>

                        <div class="mt-6">
                            <a href="{{-- route('nama.route.create') --}}" class="btn btn-primary">
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
        <section class="overflow-hidden rounded-xl bg-white shadow-md">
            <div class="flex items-center justify-between border-b border-gray-200 p-6">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Tabungan Kamu</h2>
                    <p class="text-sm text-gray-500">Berikut adalah target tabungan yang masih aktif.</p>
                </div>
                <a href="{{ route('savings.index') }}"
                    class="flex items-center gap-2 text-sm font-medium text-indigo-600 hover:text-indigo-800">
                    Lihat Semua
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
            </div>
            <ul class="space-y-6 p-6">
                @forelse ($savings as $saving)
                    @php
                        $percentage = 0;
                        if ($saving->target_amount > 0) {
                            $percentage = ($saving->current_amount / $saving->target_amount) * 100;
                        }
                    @endphp
                    <li>
                        <div class="flex justify-between font-medium">
                            <span>{{ $saving->goal_name }}</span>
                            <span class="text-indigo-500">{{ number_format($percentage, 0) }}%</span>
                        </div>
                        <p class="text-base-content/70 text-sm">
                            Rp {{ number_format($saving->current_amount, 0, ',', '.') }} /
                            Rp {{ number_format($saving->target_amount, 0, ',', '.') }}
                        </p>

                        {{-- Progress bar dengan warna "success" --}}
                        <progress class="progress progress-primary w-full" value="{{ $percentage }}"
                            max="100"></progress>
                    </li>
                @empty
                    <div class="mt-8 text-center">
                        {{-- Ikon SVG --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 10h.01M15 10h.01M9 14h6" />
                        </svg>

                        {{-- Judul Pesan --}}
                        <h3 class="mt-2 text-lg font-medium text-gray-900">
                            Belum Ada Data
                        </h3>

                        {{-- Deskripsi --}}
                        <p class="mt-1 text-sm text-gray-500">
                            Sepertinya Anda belum membuat data apapun. Mulai sekarang!
                        </p>

                        {{-- Tombol Aksi (Call to Action) --}}
                        <div class="mt-6">
                            <a href="{{-- route('nama.route.create') --}}" class="btn btn-primary">
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
