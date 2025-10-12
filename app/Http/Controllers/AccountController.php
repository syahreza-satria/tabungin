<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('pages.settings.index', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input dari form
        $validatedData = $request->validate([
            'name'      => 'required|string|max:255',
            'username'  => 'nullable|string|max:255|unique:users,username,' . $user->id,
            'phone'     => 'nullable|string|max:25|unique:users,phone,' . $user->id,
            'gender'    => 'nullable|string|in:Laki-laki,Perempuan',
            'email'     => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // maks 2MB
        ]);

        // Cek jika ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada untuk menghemat penyimpanan
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            // Simpan gambar baru dan dapatkan path-nya
            $validatedData['image'] = $request->file('image')->store('profile-images', 'public');
        }

        // Update data pengguna dengan data yang sudah divalidasi
        $user->update($validatedData);

        // Redirect kembali ke halaman pengaturan dengan pesan sukses
        return redirect()->route('settings.index')->with('success', 'Profil berhasil diperbarui!');
    }

    public function destroy(Request $request, User $setting)
    {
        // Sesuaikan juga penggunaannya di dalam method
        if (auth()->id() !== $setting->id) {
            abort(403, 'AKSI TIDAK DIIZINKAN');
        }

        Auth::logout();

        if ($setting->image) {
            Storage::disk('public')->delete($setting->image);
        }

        $setting->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Akun Anda telah berhasil dihapus.');
    }
}
