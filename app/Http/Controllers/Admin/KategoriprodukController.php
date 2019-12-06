<?php

namespace App\Http\Controllers\Admin;

use App\Kategoriproduk;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriprodukController extends Controller
{
    public function index()
    {
        $kategoriproduks = Kategoriproduk::all();
        return view('admin.kategoriproduk.index', compact('kategoriproduks'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategoriproduk.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required'
        ]);
        $kategoriproduks = new Kategoriproduk();
        $kategoriproduks->nama = $request->nama;
        $kategoriproduks->save();
        Toastr::success('Berhasil di Upload', 'Kategori Produk', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('kategoriproduk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoriproduks = Kategoriproduk::find($id);
        return view('admin.kategoriproduk.edit', compact('kategoriproduks'));
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
        $kategoriproduks = Kategoriproduk::find($id);
        $kategoriproduks->nama = $request->nama;
        $kategoriproduks->save();
        Toastr::success('Berhasil Di Edit', 'Kategori Produk', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('kategoriproduk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategoriproduk::find($id)->delete();
        Toastr::success('Berhasil Di Hapus', 'Kategori Produk', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }
}
