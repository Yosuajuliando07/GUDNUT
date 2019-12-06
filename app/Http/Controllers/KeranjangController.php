<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
class KeranjangController extends Controller

// Cart::add() =  menambahkan item keranjang
// Cart::update()
// Cart::remove() = per row
// Cart::destroy()  = hapus semua
// Cart::total() = Metode total () dapat digunakan untuk mendapatkan total yang dihitung dari semua item dalam troli, mengingat ada harga dan kuantitas.
// Cart::subtotal() = Metode subtotal () dapat digunakan untuk mendapatkan total semua item dalam troli, dikurangi jumlah total pajak.
// Cart::tax()
// Cart::count() = hitung qty

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop.keranjang');
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
        // $terjadi_duplikat = Cart::search(function($cartItem, $request){
        //     return $cartItem->id === $request->id;

        // use untuk import namespace ke namespace lain
        $duplikat = Cart::search(function($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->id;
        });
            if ($duplikat->isNotEmpty())
            {
                return redirect()->route('keranjang.index')->with('success_message', 'Produk Sudah Dimasukan Sebelumnya');
            }
        Cart::add(
            $request->id, $request->nama_produk, 1, $request->harga, $request->berat
            )->associate('App\Produk');
        return redirect()->route('keranjang.index')->with('success_message', 'Segera Lakukan Pembayaran');
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
        $this->validate($request, [
            'qty' => 'required|numeric',
        ]);
        Cart::update($id, $request->qty)->associate('App\Produk');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success_message', 'Produk Berhasil Dihapus Dari Keranjang');
    }
}
