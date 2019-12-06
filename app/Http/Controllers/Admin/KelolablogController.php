<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Kategoriblog;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelolablogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriblogs = Kategoriblog::all();
        return view('admin.blog.tambah', compact('kategoriblogs'));
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
            'judul' => 'required',
            'gambar' => 'required|mimes:jpeg,bmp,png,jpg',
            'artikel' => 'required',
            'kategori' => 'required',
        ]);
        $gambar = $request->file('gambar');
        $namaGambar = time()."_".$gambar->getClientOriginalName();
        Image::make($gambar)->resize(1200,707)->save(public_path('/upload/blog/'. $namaGambar));

        $blog = new Blog();
        $blog->user_id = Auth::id();
        $blog->judul = $request->judul;
        $blog->gambar = $namaGambar;
        $blog->artikel = $request->artikel;
        $blog->kategoriblog_id = $request->kategori;
        $blog->save();
        Toastr::success('Berhasil di Tambah', 'Blog', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogs = Blog::find($id);
        return view('admin.blog.detail', compact('blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoriblogs = Kategoriblog::all();
        $blogs = Blog::find($id);
        return view('admin.blog.edit', compact('blogs', 'kategoriblogs'));
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
            'judul' => 'required',
            'gambar' => 'mimes:jpeg,bmp,png,jpg',
            'artikel' => 'required',
            'kategori' => 'required',
        ]);
        $blogs = Blog::find($id);
        $blogs->judul = $request->judul;
        $gambar = $request->file('gambar');
        if (isset($gambar))
        {
            $namaGambar = time()."_".$gambar->getClientOriginalName();
            Image::make($gambar)->resize(1200,707)->save(public_path('/upload/blog/'. $namaGambar));
         } else {
            $namaGambar = $blogs->gambar;
        }
        $blogs->user_id = Auth::id();
        $blogs->judul = $request->judul;
        $blogs->gambar = $namaGambar;
        $blogs->artikel = $request->artikel;
        $blogs->kategoriblog_id = $request->kategori;
        $blogs->save();
        Toastr::success('Berhasil di Edit', 'Blog', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('blog.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogs = Blog::find($id);
        $blogs->delete();
        Toastr::success('Berhasil Di Hapus', 'Blog', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }
}
