<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategoriproduk;
use App\Komentar;
use App\Order;
use App\Produk;
use App\Slide;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {

    //     $komentars = Komentar::all();
    //     $users = User::all();

    //     return view('admin.admin-dashboard')
    // );
    $users = User::all();
    $sliders = Slide::where('status', true)->get();
    $produks = Produk::all();
    $blogs = Blog::all();
    $komentars = Komentar::all();
    $kategoriproduks = Kategoriproduk::all();
    return view('admin.admin-dashboard', compact('sliders','blogs', 'users', 'komentars', 'produks', 'kategoriproduks'));
    }
}
