<?php

namespace App\Http\Controllers\Admin;

use App\Buktipembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order_detail;
use Brian2694\Toastr\Facades\Toastr;

class DisplayorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                                    // ambilSemua
        $buktipembayarans = Buktipembayaran::all();
        return view('admin.order.index', compact('buktipembayarans'));
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
        return view('admin.order.detail', compact('order_details'));
    }

    public function disetujui($id)
    {
        $var = Order_detail::find($id);
        $var->update(['status_bayar'=> true]);
        Toastr::success('Konfirmasi', 'Sukses', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('displayorder.index');
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
