<?php

namespace App\Http\Controllers\Admin;

use App\Slide;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slide::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.tambah');
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
            'keterangan' => 'required',
            'gambar' => 'required',
            'status' => 'required',
        ]);
		$gambar = $request->file('gambar');
		$namaGambar = time()."_".$gambar->getClientOriginalName();
        Image::make($gambar)->resize(1600,707)->save(public_path('/upload/slider/'. $namaGambar));
        $sliders = new Slide();
        $sliders->keterangan = $request->keterangan;
        $sliders->status = $request->status;
        $sliders->gambar = $namaGambar;
        $sliders->save();
        Toastr::success('Berhasil di Tambah', 'Slide', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('slider.index');
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
        $sliders = Slide::find($id);
        return view('admin.slider.edit', compact('sliders'));
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
            'keterangan' => 'required',
            'gambar' => 'mimes:jpeg,bmp,png,jpg',
            'status' => 'required'
        ]);
        $sliders = Slide::find($id);
        // Call to a member function getClientOriginalName() on null
        $gambar = $request->file('gambar');
        if (isset($gambar))
        {
            $namaGambar = time()."_".$gambar->getClientOriginalName();
            Image::make($gambar)->resize(1600,707)->save(public_path('/upload/slider/'. $namaGambar));
        } else {
            $namaGambar = $sliders->gambar;
        }
        $sliders->keterangan = $request->keterangan;
        $sliders->status = $request->status;
        $sliders->gambar = $namaGambar;
        $sliders->save();
        Toastr::success('Berhasil di Edit', 'Slide', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('slider.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sliders = Slide::find($id);
        $sliders->delete();
        Toastr::success('Berhasil Di Hapus', 'Slide', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }

    public function aktif($id)
    {
        $sliders = Slide::find($id);
        $sliders->update([ 'status'=> true ]);
        Toastr::success('Status Slide', 'Aktif', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }
    public function nonaktif($id)
    {
        $sliders = Slide::find($id);
        $sliders->update([ 'status'=> false ]);
        Toastr::success('Status Slide', 'Non-Aktif', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }
}
