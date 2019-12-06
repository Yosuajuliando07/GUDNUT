<?php

namespace App\Http\Controllers\Pelanggan;

use App\Order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;


use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $riwayat_transaksi = Auth::user()->order()->where('status_brg_sampai', true)->get();

        $orders = Auth::user()->order()->where('status_brg_sampai', false)->get();
        return view('pelanggan.order.order-index', compact('orders','riwayat_transaksi'));
    }
    public function barangSampai($id)
    {
        $klik = Order::find($id);
        $klik->update(['status_brg_sampai'=> true]);
        Toastr::success('Sukses', 'Konfirmasi', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Auth::user()->order()->get();
        $order_details = Order_detail::where('order_id', $id)->get();
        return view('pelanggan.order.show', compact('order_details', 'orders'));
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
