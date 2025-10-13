@extends('layouts.app')

@section('content')
    <section class="rounded-2xl bg-white p-8 shadow">
        <form action="{{ route('accounts.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <h1 class="text-2xl font-bold">Pengaturan Akun</h1>
                <p class="text-base-content/60 text-sm">Perbarui informasi profil dan akun Anda di sini.</p>
            </div>

            <div class="flex flex-col items-start gap-8 lg:flex-row lg:gap-12">
                <section class="flex w-full flex-col items-center gap-4 text-center lg:w-1/3">
                    <div class="avatar">
                        <div class="ring-primary ring-offset-base-100 w-36 rounded-full ring ring-offset-2">
                            @if ($user->image)
                                <img src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->name }}" />
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&size=256&background=6366f1"
                                    alt="{{ $user->name }}" />
                            @endif
                        </div>
                    </div>
                    <div>
                        <input type="file" name="image"
                            class="file-input file-input-bordered file-input-sm w-full max-w-xs" />
                        <p class="text-base-content/60 mt-2 text-xs">Ukuran maks: 2MB</p>
                    </div>
                </section>

                <section class="w-full flex-grow space-y-4">
                    <div class="form-control">
                        <label for="name" class="label">
                            <span class="label-text">Nama Lengkap</span>
                        </label>
                        <input type="text" name="name" id="name" class="input input-bordered w-full"
                            value="{{ old('name', $user->name) }}">
                    </div>

                    <div class="form-control">
                        <label for="username" class="label">
                            <span class="label-text">Username</span>
                        </label>
                        <input type="text" name="username" id="username" class="input input-bordered w-full"
                            value="{{ old('username', $user->username) }}" placeholder="John Doe">
                    </div>

                    <div class="form-control">
                        <label for="phone" class="label">
                            <span class="label-text">Username</span>
                        </label>
                        <input type="text" name="phone" id="phone" class="input input-bordered w-full"
                            value="{{ old('phone', $user->phone) }}" placeholder="62852555666">
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Jenis Kelamin</span>
                        </label>
                        <div class="flex gap-6">
                            <label class="label cursor-pointer space-x-2">
                                <input type="radio" name="gender" value="Laki-laki" class="radio radio-primary"
                                    {{ old('gender', $user->gender) == 'Laki-laki' ? 'checked' : '' }} />
                                <span class="label-text">Laki-laki</span>
                            </label>
                            <label class="label cursor-pointer space-x-2">
                                <input type="radio" name="gender" value="Perempuan" class="radio radio-primary"
                                    {{ old('gender', $user->gender) == 'Perempuan' ? 'checked' : '' }} />
                                <span class="label-text">Perempuan</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-control">
                        <label for="email" class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" name="email" id="email" class="input input-bordered w-full"
                            value="{{ old('email', $user->email) }}">
                    </div>
                </section>
            </div>

            <div class="divider mt-8"></div>

            <div class="flex flex-col items-center justify-between gap-4 pt-4 sm:flex-row">
                <div>
                    <button type="button" id="delete-account-button" class="btn btn-outline btn-error"
                        data-user-name="{{ $user->name }}">
                        Hapus Akun
                    </button>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
        <form id="delete-account-form" action="{{ route('accounts.destroy', $user->id) }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const deleteButton = document.getElementById('delete-account-button');

                if (deleteButton) {
                    deleteButton.addEventListener('click', function() {
                        const userName = this.dataset.userName;

                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            html: `Anda akan menghapus akun <strong>${userName}</strong> secara permanen.<br>Aksi ini tidak bisa dibatalkan!`,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#e53935',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Ya, hapus akun saya!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('delete-account-form').submit();
                            }
                        });
                    });
                }
            });
        </script>

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
