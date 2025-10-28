<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Saving;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $bills = Bill::where('user_id', auth()->id())->where('status', 'unpaid')->orderBy('created_at', 'desc')->take(4)->get();
        $savings = Saving::where('user_id', auth()->id())
                        ->whereColumn('current_amount', '<', 'target_amount')
                        ->orderBy('current_amount', 'desc')->take(4)->get();

        return view('index', compact('bills', 'savings'));
    }
}
