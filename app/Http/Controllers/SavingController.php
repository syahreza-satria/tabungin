<?php

namespace App\Http\Controllers;

use App\Models\Saving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $savings = Saving::all();
        return view('pages.savings.index', compact('savings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'goal_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'target_amount' => 'required|numeric|min:0',
        ]);

        $validatedData['user_id'] = Auth::id();

        Saving::create($validatedData);

        return redirect()->route('savings.index')->with('success', 'Target tabungan baru berhasil dibuat!');
    }

        public function addFunds(Request $request, Saving $saving)
    {
        // Otorisasi
        if ($saving->user_id !== Auth::id()) {
            abort(403);
        }

        $validatedData = $request->validate([
            'amount_to_add' => 'required|numeric|min:1',
        ]);

        $saving->current_amount += $validatedData['amount_to_add'];
        $saving->save();

        return redirect()->route('savings.index')->with('success', 'Dana berhasil ditambahkan ke tabungan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Saving $saving)
    {
        // Otorisasi
        if ($saving->user_id !== Auth::id()) {
            abort(403);
        }

        $validatedData = $request->validate([
            'goal_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'target_amount' => 'required|numeric|min:0',
        ]);

        $saving->update($validatedData);

        return redirect()->route('savings.index')->with('success', 'Target tabungan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Saving $saving)
    {
        // Otorisasi
        if ($saving->user_id !== Auth::id()) {
            abort(403);
        }

        $saving->delete();

        return redirect()->route('savings.index')->with('success', 'Target tabungan berhasil dihapus.');
    }
}
