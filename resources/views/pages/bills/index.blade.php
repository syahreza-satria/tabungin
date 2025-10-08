@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-12 items-start gap-8 p-4 sm:p-6 lg:py-8">
        <div class="col-span-12 rounded-xl border border-slate-200 bg-white shadow-sm lg:col-span-6">
            {{-- Header Kartu --}}
            <div class="flex items-center justify-between border-b border-slate-200 p-4 sm:p-6">
                <div class="flex flex-col">
                    <h1 class="text-lg font-semibold text-slate-800">Daftar Hutang Belum Lunas</h1>
                    <p class="mt-1 text-sm text-slate-500">Total: {{ number_format($unpaid_bills->sum('amount')) }}</p>
                </div>
                <button type="button" onclick="addDataModal.showModal()"
                    class="flex cursor-pointer items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span>Tambah</span>
                </button>
            </div>
            <ul class="divide-y divide-slate-200">
                @forelse ($unpaid_bills as $bill)
                    <li class="flex items-center justify-between p-4 transition-colors duration-200 hover:bg-slate-50">
                        <div class="flex flex-col items-start gap-1">
                            <h2 class="font-medium text-slate-800">{{ $bill->name }}</h2>
                            <span class="flex items-center gap-1.5 text-sm text-slate-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0h18" />
                                </svg>
                                {{ $bill->created_at->format('d M Y') }}
                            </span>
                            @if ($bill->description)
                                <p class="pt-1 text-sm text-slate-600">{{ $bill->description }}</p>
                            @endif
                        </div>
                        <div class="flex flex-shrink-0 items-center gap-4">
                            <span class="font-semibold text-indigo-600">{{ number_format($bill->amount) }}</span>
                            <div class="flex items-center gap-2">
                                <button type="button" data-id="{{ $bill->id }}" data-name="{{ $bill->name }}"
                                    data-amount="{{ $bill->amount }}" data-description="{{ $bill->description }}"
                                    data-due_date="{{ $bill->due_date }}" data-status="{{ $bill->status }}"
                                    class="edit-button cursor-pointer rounded-md p-1 text-slate-400 transition-colors duration-200 hover:text-amber-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </button>
                                <button type="button"
                                    class="cursor-pointer rounded-md p-1 text-slate-400 transition-colors duration-200 hover:text-rose-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="p-6 text-center text-slate-500">
                        <p>Tidak ada hutang yang belum lunas. Kerja bagus!</p>
                    </li>
                @endforelse
            </ul>
        </div>
        <div class="col-span-12 rounded-xl border border-slate-200 bg-white shadow-sm lg:col-span-6">
            <div class="flex items-center justify-between border-b border-slate-200 p-4 sm:p-6">
                <div class="flex flex-col">
                    <h1 class="text-lg font-semibold text-slate-800">Daftar Hutang Lunas</h1>
                    <p class="mt-1 text-sm text-slate-500">Total: {{ number_format($paid_bills->sum('amount')) }}</p>
                </div>
            </div>
            <ul class="divide-y divide-slate-200">
                @forelse ($paid_bills as $bill)
                    <li class="flex items-center justify-between p-4 transition-colors duration-200 hover:bg-slate-50">
                        <div class="flex flex-col items-start gap-1">
                            <h2 class="font-medium text-slate-800">{{ $bill->name }}</h2>
                            <span class="flex items-center gap-1.5 text-sm text-slate-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0h18" />
                                </svg>
                                {{ $bill->created_at->format('d M Y') }}
                            </span>
                            @if ($bill->description)
                                <p class="pt-1 text-sm text-slate-600">{{ $bill->description }}</p>
                            @endif
                        </div>
                        <div class="flex flex-shrink-0 items-center gap-4">
                            <span
                                class="font-semibold text-green-600 line-through">{{ number_format($bill->amount) }}</span>
                            <div class="flex items-center gap-2">
                                <button type="button" data-id="{{ $bill->id }}" data-name="{{ $bill->name }}"
                                    data-amount="{{ $bill->amount }}" data-description="{{ $bill->description }}"
                                    data-due_date="{{ $bill->due_date }}" data-status="{{ $bill->status }}"
                                    class="edit-button cursor-pointer rounded-md p-1 text-slate-400 transition-colors duration-200 hover:text-amber-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </button>
                                <button type="button"
                                    class="cursor-pointer rounded-md p-1 text-slate-400 transition-colors duration-200 hover:text-rose-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="p-6 text-center text-slate-500">
                        <p>Belum ada hutang yang lunas.</p>
                    </li>
                @endforelse
            </ul>
        </div>

    </div>

    <dialog id="addDataModal" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 cursor-pointer">✕</button>
            </form>
            <h3 class="text-lg font-bold">Tambah Hutang</h3>
            <form action="{{ route('bills.store') }}" method="post" class="my-4 space-y-4">
                @csrf
                @method('POST')
                <div class="flex flex-col gap-1">
                    <label for="name" class="text-sm text-neutral-500">Nama Tagihan</label>
                    <input type="text" name="name" id="name"
                        class="rounded-xl border border-neutral-300 px-4 py-2" placeholder="Nasi Ayam Goreng">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="amount" class="text-sm text-neutral-500">Jumlah Tagihan</label>
                    <input type="number" name="amount" id="amount"
                        class="rounded-xl border border-neutral-300 px-4 py-2" placeholder="Rp 15.000" min="0">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="description" class="text-sm text-neutral-500">Deskripsi (Opsional)</label>
                    <textarea name="description" id="description" cols="30" rows="3"
                        class="rounded-xl border border-neutral-300 px-4 py-2"></textarea>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="due_date" class="text-sm text-neutral-500">Deadline (Opsional)</label>
                    <input type="date" name="due_date" id="due_date"
                        class="rounded-xl border border-neutral-300 px-4 py-2" placeholder="Rp 15.000" min="0">
                </div>
                <div class="flex w-full justify-end">
                    <button type="submit"
                        class="Duration-300 cursor-pointer rounded-xl bg-indigo-500 px-4 py-2 text-white transition hover:bg-indigo-400">Tambahkan</button>
                </div>
            </form>
    </dialog>

    <dialog id="editDataModal" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 cursor-pointer">✕</button>
            </form>
            <h3 class="text-lg font-bold">Edit Hutang</h3>
            <form action="" id="editForm" method="post" class="my-4 space-y-4">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-1">
                    <label for="name" class="text-sm text-neutral-500">Nama Tagihan</label>
                    <input type="text" name="name" id="edit_name"
                        class="rounded-xl border border-neutral-300 px-4 py-2" placeholder="Nasi Ayam Goreng">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="edit_amount_display" class="text-sm text-neutral-500">Jumlah Tagihan</label>
                    <div class="flex items-center gap-1">
                        <span class="text-neutral-500">Rp</span>
                        <input type="text" id="edit_amount_display"
                            class="w-full rounded-xl border border-neutral-300 px-4 py-2" inputmode="numeric">
                    </div>
                    <input type="hidden" name="amount" id="edit_amount">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="description" class="text-sm text-neutral-500">Deskripsi (Opsional)</label>
                    <textarea name="description" id="edit_description" cols="30" rows="3"
                        class="rounded-xl border border-neutral-300 px-4 py-2"></textarea>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="due_date" class="text-sm text-neutral-500">Deadline (Opsional)</label>
                    <input type="date" name="due_date" id="edit_due_date"
                        class="rounded-xl border border-neutral-300 px-4 py-2" placeholder="Rp 15.000" min="0">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="edit_status" class="text-sm text-neutral-500">Status</label>
                    <select name="status" id="edit_status" class="select select-bordered w-full rounded-xl">
                        <option value="unpaid">Belum Dibayar</option>
                        <option value="paid">Sudah Dibayar</option>
                    </select>
                </div>
                <div class="flex w-full justify-end">
                    <button type="submit"
                        class="Duration-300 cursor-pointer rounded-xl bg-indigo-500 px-4 py-2 text-white transition hover:bg-indigo-400">Tambahkan</button>
                </div>
            </form>
    </dialog>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const editModal = document.getElementById('editDataModal');
                const editForm = document.getElementById('editForm');
                const editNameInput = document.getElementById('edit_name');
                const editDisplayAmountInput = document.getElementById('edit_amount_display');
                const editHiddenAmountInput = document.getElementById('edit_amount');
                const editDescriptionInput = document.getElementById('edit_description');
                const editDueDateInput = document.getElementById('edit_due_date');
                const editStatusInput = document.getElementById('edit_status');
                const editButtons = document.querySelectorAll('.edit-button');

                function setupCurrencyInput(displayInputId, hiddenInputId) {
                    const displayInput = document.getElementById(displayInputId);
                    const hiddenInput = document.getElementById(hiddenInputId);

                    if (displayInput) {
                        displayInput.addEventListener('input', function(e) {
                            let rawValue = e.target.value.replace(/\D/g, '');
                            hiddenInput.value = rawValue;
                            let formattedValue = new Intl.NumberFormat('id-ID').format(rawValue);
                            if (rawValue.length > 0) {
                                e.target.value = formattedValue;
                            } else {
                                e.target.value = '';
                            }
                        });
                    }
                }

                setupCurrencyInput('add_amount_display', 'add_amount');
                setupCurrencyInput('edit_amount_display', 'edit_amount');


                editButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const billId = this.dataset.id;
                        const billName = this.dataset.name;
                        const billAmount = this.dataset.amount;
                        const billDescription = this.dataset.description;
                        const billDueDate = this.dataset.dueDate;
                        const billStatus = this.dataset.status;

                        const updateUrl = `/bills/${billId}`;
                        editForm.setAttribute('action', updateUrl);

                        editNameInput.value = billName;
                        editDescriptionInput.value = billDescription;
                        editDueDateInput.value = billDueDate;
                        editStatusInput.value = billStatus;

                        editHiddenAmountInput.value = billAmount;
                        editDisplayAmountInput.value = new Intl.NumberFormat('id-ID').format(
                            billAmount);

                        editModal.showModal();
                    });
                });
            });
        </script>
    @endpush
@endsection
