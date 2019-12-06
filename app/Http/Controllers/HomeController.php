<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Blog;
use App\Produk;
use App\Slide;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slide::where('status', true)->get();
        $produks = Produk::inRandomOrder()->take(8)->get();
        $blogs = Blog::inRandomOrder()->take(3)->get();
        return view('welcome', compact('produks', 'sliders','blogs'));
    }
}
