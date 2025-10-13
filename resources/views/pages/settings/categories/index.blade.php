@extends('layouts.app')

@section('content')
    {{-- Container Utama --}}
    <section class="bg-base-100 space-y-6 rounded-2xl p-4 shadow-sm sm:p-6 lg:p-8">
        {{-- Header Halaman --}}
        <div class="flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-center">
            <div>
                <h1 class="text-base-content text-xl font-bold">Manajemen Kategori</h1>
                <p class="text-base-content/70 mt-1 text-sm">Tambah, edit, atau hapus kategori sesuai kebutuhan Anda.</p>
            </div>
            <button onclick="addModal.showModal()" class="btn btn-primary btn-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Kategori
            </button>
        </div>

        {{-- Tabel Data --}}
        <div class="border-base-200 overflow-x-auto rounded-lg border">
            <table class="table-zebra table">
                <thead class="bg-base-200">
                    <tr>
                        <th class="w-full">Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td class="font-medium">{{ $category->name }}</td>
                            <td class="flex gap-2">
                                {{-- Tombol Edit --}}
                                <button class="edit-button btn btn-ghost btn-sm text-warning" data-id="{{ $category->id }}"
                                    data-name="{{ $category->name }}">
                                    Edit
                                </button>
                                {{-- Tombol Hapus --}}
                                <form id="delete-form-{{ $category->id }}"
                                    action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="delete-button btn btn-ghost btn-sm text-error"
                                        data-id="{{ $category->id }}" data-name="{{ $category->name }}">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-base-content/50 p-6 text-center">
                                Tidak ada kategori yang tersimpan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <dialog id="addModal" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-circle btn-ghost btn-sm absolute right-2 top-2">✕</button>
            </form>
            <h3 class="text-lg font-bold">Tambah Kategori Baru</h3>
            <form action="{{ route('categories.store') }}" method="POST" class="mt-4 space-y-4">
                @csrf
                <div>
                    <label for="name" class="label">
                        <span class="label-text">Nama Kategori</span>
                    </label>
                    <input type="text" name="name" id="name" placeholder="cth: Makanan Pokok"
                        class="input input-bordered w-full" required />
                </div>
                <div class="modal-action">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </dialog>

    <dialog id="editModal" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-circle btn-ghost btn-sm absolute right-2 top-2">✕</button>
            </form>
            <h3 class="text-lg font-bold">Edit Kategori</h3>
            <form id="editForm" method="POST" class="mt-4 space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label for="edit_name" class="label">
                        <span class="label-text">Nama Kategori</span>
                    </label>
                    <input type="text" name="name" id="edit_name" class="input input-bordered w-full" required />
                </div>
                <div class="modal-action">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </dialog>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editModal = document.getElementById('editModal');
            const editForm = document.getElementById('editForm');
            const editNameInput = document.getElementById('edit_name');
            const editButtons = document.querySelectorAll('.edit-button');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const categoryId = this.dataset.id;
                    const categoryName = this.dataset.name;

                    const updateUrl = `{{ url('settings/categories') }}/${categoryId}`;
                    editForm.setAttribute('action', updateUrl);

                    editNameInput.value = categoryName;

                    editModal.showModal();
                });
            });

            const deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();

                    const categoryId = this.dataset.id;
                    const categoryName = this.dataset.name;
                    const form = document.getElementById(`delete-form-${categoryId}`);

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: `Anda akan menghapus kategori "${categoryName}". Aksi ini tidak dapat dibatalkan!`,
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
        });
    </script>
@endpush
