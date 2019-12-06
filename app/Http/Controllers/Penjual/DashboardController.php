<?php

namespace App\Http\Controllers\Penjual;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $produks = Auth::user()->produk()->latest()->take(4)->get();
        return view('penjual.penjual-dashboard', compact('produks'));
    }
}
