<?php

namespace App\Http\Controllers\Penjual;

use App\Kategoriproduk;
use App\Produk;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kota;

class KelolaprodukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Auth::user()->produk()->latest()->get();
        return view('penjual.produk.index', ['produks' => $produks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(Auth::user()->bank == NULL) {
        //     Toastr::success('Harus di isi untuk berjualan', 'Bank', ["positionClass" => "toast-bottom-right"]);
        //     return redirect()->route('bank.create');
        // }

        $kategoriproduks = Kategoriproduk::all();
        $kotas = Kota::all();
        return view('penjual.produk.tambah', compact('kategoriproduks','kotas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_produk' => 'required',
            'gambar_produk' => 'required',
            'deskripsi_produk' => 'required',
            'alamat_lengkap_produk' => 'required',
            'harga' => 'required|numeric|integer',
            'berat' => 'required|numeric',
            'stok' => 'required|numeric|max:50|integer',
            'kategori'=>'required',
            'kota_asal_produk' => 'required',
            ]);
            $gambar_produk = $request->file('gambar_produk');
            $nama_gambar = time()."_".$gambar_produk->getClientOriginalName();
            Image::make($gambar_produk)->resize(700,700)->save(public_path('/upload/produk/'. $nama_gambar));

            $produk = new Produk();
            $produk->user_id = Auth::id();
            $produk->nama_produk = $request->nama_produk;
            $produk->deskripsi_produk = $request->deskripsi_produk;
            $produk->kategoriproduk_id = $request->kategori;
            $produk->kota_id = $request->kota_asal_produk;
            $produk->alamat_lngkp_produk = $request->alamat_lengkap_produk;
            $produk->harga = $request->harga;
            $produk->berat = $request->berat;
            $produk->stok = $request->stok;
            $produk->gambar_produk = $nama_gambar;
            $produk->save();
            Toastr::success('Berhasil di Upload', 'Produk', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('produk.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produks = Produk::find($id);
        return view('penjual.produk.detail', compact('produks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $kotas = Kota::all();
        $produks = Produk::find($id);
        $kategoriproduks = Kategoriproduk::all();
        return view('penjual.produk.edit', compact('produks', 'kategoriproduks','kotas'));
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
        $this->validate($request,[
            'nama_produk' => 'required',
            'gambar_produk' => 'mimes:jpeg,bmp,png,jpg',
            'deskripsi_produk' => 'required',
            'harga' => 'required|numeric',
            'berat' => 'required|numeric',
            'stok' => 'required',
            'kategori'=>'required',
            'alamat_lengkap_produk' => 'required',
            'kota_asal_produk' => 'required',
        ]);
        $produks = Produk::find($id);
        $gambar_produk = $request->file('gambar_produk');
        if (isset($gambar_produk))
        {
            $nama_gambar = time()."_".$gambar_produk->getClientOriginalName();
            Image::make($gambar_produk)->resize(700, 700)->save(public_path('/upload/produk/'. $nama_gambar));
        } else {
            $nama_gambar = $produks->gambar_produk;
        }
        $produks->user_id = Auth::id();
        $produks->nama_produk = $request->nama_produk;
        $produks->gambar_produk = $nama_gambar;
        $produks->deskripsi_produk = $request->deskripsi_produk;
        $produks->harga = $request->harga;
        $produks->berat = $request->berat;
        $produks->stok = $request->stok;
        $produks->kota_id = $request->kota_asal_produk;
        $produks->alamat_lngkp_produk = $request->alamat_lengkap_produk;
        $produks->kategoriproduk_id = $request->kategori;
        $produks->save();
        Toastr::success('Berhasil di Edit', 'Produk', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produks = Produk::find($id);
        $produks->delete();
        Toastr::success('Berhasil Di Hapus', 'Produk', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }
}
