@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 sm:p-6 md:p-0">
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

        <div class="space-y-4">
            @forelse ($savings as $saving)
                <div
                    class="flex flex-col items-start justify-between gap-4 rounded-xl border border-slate-200 bg-white p-4 shadow-sm sm:flex-row sm:items-center">
                    <div class="w-full flex-grow">
                        <h2 class="card-title text-slate-800">{{ $saving->goal_name }}</h2>
                        @if ($saving->description)
                            <p class="mt-1 truncate text-sm text-slate-500" title="{{ $saving->description }}">
                                {{ $saving->description }}
                            </p>
                        @endif
                        <div class="mt-2">
                            @php
                                $progress =
                                    $saving->target_amount > 0
                                        ? ($saving->current_amount / $saving->target_amount) * 100
                                        : 0;
                            @endphp
                            <progress class="progress progress-primary w-full" value="{{ $progress }}"
                                max="100"></progress>
                            <div class="mt-2 flex justify-between text-sm text-slate-600">
                                <span>Rp {{ number_format($saving->current_amount, '0', '.', '.') }}</span>
                                <span class="font-semibold">Rp
                                    {{ number_format($saving->target_amount, '0', '.', '.') }}</span>
                            </div>
                            <div
                                class="{{ $progress >= 100 ? 'text-green-500' : 'text-primary' }} mt-1 text-right text-xs font-bold">
                                {{ number_format($progress, 1) }}% Tercapai
                            </div>
                        </div>
                    </div>

                    <div class="flex w-full flex-shrink-0 items-center justify-end gap-2 sm:w-auto">
                        @if ($saving->current_amount < $saving->target_amount)
                            <button class="btn btn-sm btn-outline btn-primary add-funds-button"
                                data-saving-id="{{ $saving->id }}" data-saving-name="{{ $saving->goal_name }}"
                                data-current-amount="{{ $saving->current_amount }}"
                                data-target-amount="{{ $saving->target_amount }}">Tambah Dana
                            </button>
                        @endif
                        <button class="btn btn-sm btn-ghost edit-saving-button hover:text-amber-500"
                            data-id="{{ $saving->id }}" data-name="{{ $saving->goal_name }}"
                            data-target="{{ $saving->target_amount }}" data-description="{{ $saving->description }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>

                        <form id="delete-form-{{ $saving->id }}" method="POST"
                            action="{{ route('savings.destroy', $saving->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-ghost text-error delete-saving-button"
                                data-bill-id="{{ $saving->id }}" data-bill-name="{{ $saving->goal_name }}"
                                data-description="{{ $saving->description }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="rounded-lg border-2 border-dashed border-slate-300 p-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 10h.01M15 10h.01M9 14h6" />
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-slate-900">
                        Target Tabungan Kosong
                    </h3>
                    <p class="mt-1 text-sm text-slate-500">Kamu belum punya target tabungan. Ayo buat satu!</p>
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
                        class="input input-bordered w-full rounded-xl" required />
                </div>
                <div class="flex flex-col gap-1">
                    <label for="category_id" class="text-sm text-neutral-500">Kategori</label>
                    <select name="category_id" id="category_id"
                        class="select w-full appearance-none rounded-xl border border-neutral-300 px-4 py-2 text-base"
                        required>
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="description" class="text-sm text-neutral-500">Deskripsi (Opsional)</label>
                    <textarea name="description" id="description" cols="30" rows="3"
                        class="rounded-xl border border-neutral-300 px-4 py-2"></textarea>
                </div>
                <div>
                    <label class="label"><span class="label-text">Target Jumlah (Rp)</span></label>
                    <input type="text" id="add_formatted_target_amount" class="input input-bordered w-full rounded-xl"
                        placeholder="Rp 0" required />
                    <input type="hidden" name="target_amount" id="add_target_amount" />
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
                <div class="flex flex-col gap-1">
                    <label class="label"><span class="label-text text-sm">Nama Tujuan</span></label>
                    <input type="text" name="goal_name" id="edit_goal_name"
                        class="rounded-xl border border-neutral-300 px-4 py-2" required />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="label"><span class="label-text text-sm">Target Jumlah (Rp)</span></label>
                    <input type="text" id="edit_formatted_target_amount"
                        class="rounded-xl border border-neutral-300 px-4 py-2" required />
                    <input type="hidden" name="target_amount" id="edit_target_amount" />
                </div>
                <div class="flex flex-col gap-1">
                    <label for="description" class="text-sm text-neutral-500">Deskripsi (Opsional)</label>
                    <textarea name="description" id="edit_description" cols="30" rows="3"
                        class="rounded-xl border border-neutral-300 px-4 py-2"></textarea>
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
                    <label class="label"><span class="label-text text-sm">Jumlah yang Ditambahkan (Rp)</span></label>
                    <input type="text" id="add_funds_formatted_amount" placeholder="Contoh: Rp 500.000"
                        class="input input-bordered w-full" required />
                    <input type="hidden" name="amount_to_add" id="add_funds_amount_to_add" />

                    {{-- TAMBAHKAN ELEMEN INI UNTUK PESAN ERROR --}}
                    <div id="add_funds_error" class="text-error mt-1 h-4 text-xs"></div>
                </div>
                <div class="modal-action">
                    {{-- Tambahkan ID pada tombol submit --}}
                    <button type="submit" id="addFundsSubmitButton" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
    </dialog>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                function setupCurrencyInput(visibleInputId, hiddenInputId) {
                    const visibleInput = document.getElementById(visibleInputId);
                    const hiddenInput = document.getElementById(hiddenInputId);

                    if (!visibleInput || !hiddenInput) return; // Hentikan jika elemen tidak ditemukan

                    visibleInput.addEventListener('input', function(e) {
                        let rawValue = e.target.value.replace(/[^\d]/g, '');
                        hiddenInput.value = rawValue;

                        if (rawValue) {
                            const formatter = new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR',
                                minimumFractionDigits: 0
                            });
                            e.target.value = formatter.format(rawValue);
                        } else {
                            e.target.value = '';
                        }
                    });
                }

                setupCurrencyInput('add_formatted_target_amount', 'add_target_amount');
                setupCurrencyInput('edit_formatted_target_amount', 'edit_target_amount');
                setupCurrencyInput('add_funds_formatted_amount', 'add_funds_amount_to_add');


                // ==========================================================
                // ## LOGIKA MODAL EDIT (DIPERBARUI) ##
                // ==========================================================
                const editSavingModal = document.getElementById('editSavingModal');
                const editSavingForm = document.getElementById('editSavingForm');
                const editButtons = document.querySelectorAll('.edit-saving-button');

                editButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const savingId = this.dataset.id;
                        const savingName = this.dataset.name;
                        const savingTarget = this.dataset.target;
                        const savingDescription = this.dataset.description;

                        const updateUrl = `{{ url('savings') }}/${savingId}`;
                        editSavingForm.setAttribute('action', updateUrl);

                        // Isi form edit
                        document.getElementById('edit_goal_name').value = savingName;
                        document.getElementById('edit_description').value = savingDescription;

                        // PERBARUI CARA MENGISI INPUT JUMLAH
                        const hiddenInput = document.getElementById('edit_target_amount');
                        const visibleInput = document.getElementById('edit_formatted_target_amount');

                        hiddenInput.value = savingTarget; // Isi nilai mentah
                        // Tampilkan nilai yang sudah diformat
                        const formatter = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR',
                            minimumFractionDigits: 0
                        });
                        visibleInput.value = formatter.format(savingTarget);

                        editSavingModal.showModal();
                    });
                });


                // ==========================================================
                // ## LOGIKA MODAL TAMBAH DANA (TETAP SAMA) ##
                // ==========================================================
                const addFundsModal = document.getElementById('addFundsModal');
                if (addFundsModal) {
                    const addFundsForm = document.getElementById('addFundsForm');
                    const addFundsButtons = document.querySelectorAll('.add-funds-button');
                    const hiddenInput = document.getElementById('add_funds_amount_to_add');
                    const visibleInput = document.getElementById('add_funds_formatted_amount');
                    const errorDiv = document.getElementById('add_funds_error');
                    const submitButton = document.getElementById('addFundsSubmitButton');

                    let maxAddable = 0;

                    addFundsButtons.forEach(button => {
                        button.addEventListener('click', function() {
                            const savingId = this.dataset.savingId;
                            const savingName = this.dataset.savingName;
                            const currentAmount = parseFloat(this.dataset.currentAmount);
                            const targetAmount = parseFloat(this.dataset.targetAmount);

                            maxAddable = targetAmount - currentAmount;

                            // ==========================================================
                            // ## PENAMBAHAN LOGIKA PENGECEKAN ##
                            // ==========================================================
                            if (maxAddable <= 0) {
                                Swal.fire({
                                    title: 'Target Tercapai!',
                                    text: `Tabungan "${savingName}" sudah mencapai atau melebihi target.`,
                                    icon: 'success'
                                });
                                return; // Hentikan eksekusi, jangan buka modal
                            }
                            // ==========================================================

                            const formatter = new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR',
                                minimumFractionDigits: 0
                            });
                            const maxFormatted = formatter.format(maxAddable);

                            const addFundsUrl = `{{ url('savings') }}/${savingId}/add-funds`;
                            addFundsForm.setAttribute('action', addFundsUrl);
                            document.getElementById('add_funds_goal_name').textContent = savingName;

                            visibleInput.value = '';
                            hiddenInput.value = '';
                            errorDiv.textContent = `Maksimal: ${maxFormatted}`;
                            submitButton.disabled = false;

                            addFundsModal.showModal();
                        });
                    });

                    // Listener untuk validasi real-time (kode ini sudah benar dan tidak perlu diubah)
                    visibleInput.addEventListener('input', function() {
                        const rawValue = parseFloat(hiddenInput.value) || 0;
                        if (rawValue > maxAddable) {
                            errorDiv.textContent = 'Jumlah melebihi target!';
                            submitButton.disabled = true;
                        } else {
                            const formatter = new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR',
                                minimumFractionDigits: 0
                            });
                            errorDiv.textContent = `Maksimal: ${formatter.format(maxAddable)}`;
                            submitButton.disabled = false;
                        }
                    });
                }

                const deleteButtons = document.querySelectorAll('.delete-saving-button');
                deleteButtons.forEach(button => {
                    button.addEventListener('click', function(event) {
                        event.preventDefault();
                        const billId = this.dataset.billId;
                        const billName = this.dataset.billName;
                        const form = document.getElementById(`delete-form-${billId}`);
                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: `Anda akan menghapus target "${billName}". Aksi ini tidak bisa dibatalkan.`,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Ya, hapus!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                });

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
