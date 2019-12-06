<?php

namespace App\Http\Controllers\Admin;

use App\Kategoriblog;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class KategoriblogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriblogs = Kategoriblog::all();
        return view('admin.kategoriblog.index', compact('kategoriblogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategoriblog.tambah');
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
            'nama' => 'required|unique:kategoriblogs',
        ]);
        $kategoriblog = new Kategoriblog();
        $kategoriblog->nama = $request->nama;
        $kategoriblog->save();
        Toastr::success('Berhasil di Upload', 'Kategori Blog', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('kategoriblog.index');
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
        $kategoriblog = Kategoriblog::find($id);
        return view('admin.kategoriblog.edit', compact('kategoriblog'));
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
            'nama' => 'required',
        ]);
        $kategoriblog = Kategoriblog::find($id);
        $kategoriblog->nama = $request->nama;
        $kategoriblog->save();
        Toastr::success('Berhasil di Edit', 'Kategori Blog', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('kategoriblog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategoriblog::find($id)->delete();
        Toastr::success('Berhasil Di Hapus', 'Kategori Blog', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }
}
