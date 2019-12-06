<?php

namespace App\Http\Controllers\Pelanggan;

use App\Buktipembayaran;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuktipembayaranController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'gambar' => 'required',
            'order_detail_id' => 'required',
            ]);
            $gambar = $request->file('gambar');
            $namaGambar = time()."_".$gambar->getClientOriginalName();
            Image::make($gambar)->resize(372, 431)->save(public_path('/upload/buktipembayaran/'. $namaGambar));

            $buktipembayaran = new Buktipembayaran();
            $buktipembayaran->order_detail_id = $request->order_detail_id;
            $buktipembayaran->gambar = $namaGambar;
            $buktipembayaran->save();
            Toastr::success('Berhasil di Upload', 'Bukti Pembayaran', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('order.index');
}
}
