<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $bills = Bill::where('user_id', auth()->id())->where('status', 'unpaid')->get();

        return view('index', compact('bills'));
    }
}
