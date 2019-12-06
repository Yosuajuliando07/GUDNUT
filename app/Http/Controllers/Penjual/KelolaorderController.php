<?php

namespace App\Http\Controllers\Penjual;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Order_detail;
use App\Produk;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class KelolaorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $produks = Auth::user()->order()->produk()->get();
        //   return view('penjual.order.index', ['produks' => $produks]);
        $order_details = Order_detail::where('status_bayar', true)->get();
        return view('penjual.order.index', compact('order_details'));
    }
    public function kirim($id)
    {
        $order_detail = Order_detail::find($id);
        $order_detail->update(['status_brg_dikirim'=> true]);

        Toastr::success('Sukses', 'Pengirman', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('kelolaorder.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order_details = Order_detail::find($id);
        return view('penjual.order.detail', compact('order_details'));
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
}
