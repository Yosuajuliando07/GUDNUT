<?php

namespace App\Http\Controllers\Pelanggan;

use App\Kota;
use App\Order;
use App\Order_detail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class CheckoutController extends Controller
{
    public function index()
    {
        $keranjangs = Cart::content();
        $total = Cart::total();
        $kotas = Kota::all();
        return view('shop.checkout', compact('keranjangs', 'total','kotas'));
    }

    public function store(Request $request)
    {
        $orderId = Order::create([
            'user_id' => Auth::user()->id,
            'nama_penerima' => $request->nama_penerima,
            'kota_id' => $request->kota_tujuan,
            'email_penerima' => $request->email_penerima,
            'no_hp_penerima' => $request->no_hp_penerima,
            'catatan' => $request->catatan,
            'alamat_lengkap' => $request->alamat_lengkap,
            'total_bayar' => Cart::subtotal(),
            // 'total_bayar' => Cart::total(),
            ]);
            // ambil cart
                    foreach(Cart::content() as $keranjang )
                    {
                        Order_detail::create([
                            'order_id' =>$orderId->id,
                            'produk_id' => $keranjang->id,
                            'qty'   => $keranjang->qty,
                            ]);
                    }
                    Cart::destroy();
        return redirect()->route('order.index');
    }

}

