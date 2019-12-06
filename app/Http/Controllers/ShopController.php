<?php

namespace App\Http\Controllers;

use App\Kategoriproduk;
use App\Produk;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kapro = Kategoriproduk::all();
        $produks = Produk::inRandomOrder()->paginate(8);
        return view('shop.shop-index', compact('produks', 'kapro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $model = App\Flight::where('legs', '>', 100)->firstOrFail();  (LARAVEL)
           $produks = Produk::where('stok', true)->inRandomOrder()->take(4)->get();

           $produk = Produk::find($id);
           return view('shop.detail-produk', compact('produk','produks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showKategori($id)
    {
        $kapro = Kategoriproduk::all();
        $kategoriproduks = Produk::where('kategoriproduk_id', $id)->paginate(8);
        return view('shop.shop-show-kategori', compact('kategoriproduks', 'kapro'));
    }
}
