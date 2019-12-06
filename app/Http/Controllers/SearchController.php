<?php

namespace App\Http\Controllers;

// use App\Blog;
use App\Produk;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
       $query = $request->input('query');
       $produks = Produk::where('nama_produk', 'LIKE', "%$query%")->get();
    //    $blogs = Blog::where('judul', 'LIKE', "%$query%")->get();
       return view('search', compact('produks','query'));
    }
}
