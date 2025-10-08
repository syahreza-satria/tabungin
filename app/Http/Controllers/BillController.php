<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unpaid_bills = Bill::where('user_id', auth()->id())->where('status', 'unpaid')->get();
        $paid_bills = Bill::where('user_id', auth()->id())->where('status', 'paid')->get();
        return view('pages.bills.index', compact('unpaid_bills', 'paid_bills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi data yang masuk dari form
        $validatedData = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount'      => 'required|numeric|min:0',
            'due_date'    => 'nullable|date',
        ]);

        // 2. Tambahkan ID pengguna yang sedang login ke dalam data
        // Ini memastikan tagihan terhubung dengan pengguna yang benar.
        $validatedData['user_id'] = Auth::id();

        // 3. Buat dan simpan record baru ke tabel 'bills'
        Bill::create($validatedData);

        // 4. Redirect pengguna kembali ke halaman daftar tagihan
        // dengan pesan sukses.
        return redirect()->route('bills.index')
                         ->with('success', 'Tagihan baru berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bill $bill)
    {
        $validatedData = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount'      => 'required|numeric|min:0',
            'due_date'    => 'nullable|date',
            'status'      => 'required|in:unpaid,paid',
        ]);

        $bill->update($validatedData);

        return redirect()->route('bills.index')
                         ->with('success', 'Tagihan berhasil diperbarui!');
    }

    public function markAsPaid(Bill $bill)
    {
        // 1. Otorisasi: Pastikan user yang login adalah pemilik tagihan
        if ($bill->user_id !== auth()->id()) {
            abort(403, 'AKSI TIDAK DIIZINKAN');
        }

        // 2. Ubah status dan simpan ke database
        $bill->status = 'paid';
        $bill->save();

        // Alternatif: $bill->update(['status' => 'paid']);
        // Catatan: Jika menggunakan update(), pastikan 'status' ada di properti $fillable model Bill.

        // 3. Redirect kembali dengan pesan sukses
        return redirect()->route('bills.index')
                         ->with('success', 'Tagihan berhasil dilunaskan!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {
        // 1. Otorisasi: Pastikan user yang login adalah pemilik tagihan
        if ($bill->user_id !== auth()->id()) {
            abort(403, 'AKSI TIDAK DIIZINKAN');
        }

        // 2. Hapus data dari database
        $bill->delete();

        // 3. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('bills.index')
                         ->with('success', 'Tagihan berhasil dihapus.');
    }
}
