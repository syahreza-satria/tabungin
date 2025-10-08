@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        {{-- Header Halaman --}}
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Target Tabunganku</h1>
                <p class="mt-1 text-slate-500">Rencanakan tujuan keuanganmu di sini.</p>
            </div>
            <button class="btn btn-primary" onclick="addSavingModal.showModal()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Buat Target Baru
            </button>
        </div>

        {{-- Daftar Kartu Tabungan --}}
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($savings as $saving)
                <div class="card rounded-xl border border-slate-200 bg-white shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-slate-800">{{ $saving->goal_name }}</h2>

                        {{-- Progress Info --}}
                        <div class="my-4">
                            @php
                                $progress =
                                    $saving->target_amount > 0
                                        ? ($saving->current_amount / $saving->target_amount) * 100
                                        : 0;
                            @endphp
                            <progress class="progress progress-primary w-full" value="{{ $progress }}"
                                max="100"></progress>
                            <div class="mt-2 flex justify-between text-sm text-slate-600">
                                <span>@rupiah($saving->current_amount)</span>
                                <span class="font-semibold">@rupiah($saving->target_amount)</span>
                            </div>
                            <div
                                class="{{ $progress >= 100 ? 'text-green-500' : 'text-primary' }} mt-1 text-right text-xs font-bold">
                                {{ number_format($progress, 1) }}% Tercapai
                            </div>
                        </div>

                        {{-- Aksi --}}
                        <div class="card-actions justify-end">
                            <button class="btn btn-sm btn-outline btn-primary add-funds-button"
                                data-saving-id="{{ $saving->id }}" data-saving-name="{{ $saving->goal_name }}">Tambah
                                Dana</button>
                            <button class="btn btn-sm btn-ghost edit-saving-button" data-id="{{ $saving->id }}"
                                data-name="{{ $saving->goal_name }}"
                                data-target="{{ $saving->target_amount }}">Edit</button>

                            <form id="delete-form-{{ $saving->id }}" method="POST"
                                action="{{ route('savings.destroy', $saving->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-ghost text-error delete-saving-button"
                                    data-bill-id="{{ $saving->id }}"
                                    data-bill-name="{{ $saving->goal_name }}">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full rounded-lg border-2 border-dashed border-slate-300 p-12 text-center">
                    <p class="text-slate-500">Kamu belum punya target tabungan. Ayo buat satu!</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- MODALS --}}
    <dialog id="addSavingModal" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="text-lg font-bold">Buat Target Tabungan Baru</h3>
            <form action="{{ route('savings.store') }}" method="POST" class="mt-4 space-y-4">
                @csrf
                <div>
                    <label class="label"><span class="label-text">Nama Tujuan</span></label>
                    <input type="text" name="goal_name" placeholder="Contoh: Beli Laptop Baru"
                        class="input input-bordered w-full" required />
                </div>
                <div>
                    <label class="label"><span class="label-text">Target Jumlah (Rp)</span></label>
                    <input type="number" name="target_amount" placeholder="Contoh: 15000000"
                        class="input input-bordered w-full" required />
                </div>
                <div class="modal-action">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </dialog>

    <dialog id="editSavingModal" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="text-lg font-bold">Edit Target Tabungan</h3>
            <form id="editSavingForm" action="" method="POST" class="mt-4 space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="label"><span class="label-text">Nama Tujuan</span></label>
                    <input type="text" name="goal_name" id="edit_goal_name" class="input input-bordered w-full"
                        required />
                </div>
                <div>
                    <label class="label"><span class="label-text">Target Jumlah (Rp)</span></label>
                    <input type="number" name="target_amount" id="edit_target_amount" class="input input-bordered w-full"
                        required />
                </div>
                <div class="modal-action">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </dialog>

    <dialog id="addFundsModal" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="text-lg font-bold">Tambah Dana ke <span id="add_funds_goal_name" class="text-primary"></span></h3>
            <form id="addFundsForm" action="" method="POST" class="mt-4 space-y-4">
                @csrf
                @method('PATCH')
                <div>
                    <label class="label"><span class="label-text">Jumlah yang Ditambahkan (Rp)</span></label>
                    <input type="number" name="amount_to_add" placeholder="Contoh: 500000"
                        class="input input-bordered w-full" required />
                </div>
                <div class="modal-action">
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
    </dialog>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // === LOGIKA UNTUK MODAL EDIT ===
                const editSavingModal = document.getElementById('editSavingModal');
                const editSavingForm = document.getElementById('editSavingForm');
                const editButtons = document.querySelectorAll('.edit-saving-button');

                editButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const savingId = this.dataset.id;
                        const savingName = this.dataset.name;
                        const savingTarget = this.dataset.target;

                        const updateUrl = `/savings/${savingId}`;
                        editSavingForm.setAttribute('action', updateUrl);

                        document.getElementById('edit_goal_name').value = savingName;
                        document.getElementById('edit_target_amount').value = savingTarget;

                        editSavingModal.showModal();
                    });
                });

                // === LOGIKA UNTUK MODAL TAMBAH DANA ===
                const addFundsModal = document.getElementById('addFundsModal');
                const addFundsForm = document.getElementById('addFundsForm');
                const addFundsButtons = document.querySelectorAll('.add-funds-button');

                addFundsButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const savingId = this.dataset.savingId;
                        const savingName = this.dataset.savingName;

                        const addFundsUrl = `/savings/${savingId}/add-funds`;
                        addFundsForm.setAttribute('action', addFundsUrl);

                        document.getElementById('add_funds_goal_name').textContent = savingName;

                        addFundsModal.showModal();
                    });
                });

                // === LOGIKA UNTUK SWEETALERT HAPUS ===
                const deleteButtons = document.querySelectorAll('.delete-saving-button');
                deleteButtons.forEach(button => {
                    button.addEventListener('click', function(event) {
                        event.preventDefault();
                        const billId = this.dataset.billId;
                        const billName = this.dataset.billName;
                        const form = document.getElementById(`delete-form-${billId}`);

                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: `Anda akan menghapus target "${billName}".`,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, hapus!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                });

                // === LOGIKA UNTUK ALERT SUKSES ===
                @if (session('success'))
                    Swal.fire({
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                @endif
            });
        </script>
    @endpush
@endsection
