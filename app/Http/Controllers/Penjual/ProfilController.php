<?php

namespace App\Http\Controllers\Penjual;

use App\User;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfilController extends Controller
{
    public function index()
    {
        return view('penjual.profil.index');
    }
    public function updatefotoProfil(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'gambar' => 'required',
        ]);
        $user = User::findOrFail(Auth::id());
        $gambar = $request->file('gambar');
        $namaGambar = time()."_".$gambar->getClientOriginalName();
        Image::make($gambar)->resize(800, 800)->save(public_path('/upload/profil/'. $namaGambar));
        $user->nama =  $request->nama;
        $user->gambar = $namaGambar;
        $user->save();
        Toastr::success('Berhasil di Upload', 'Foto Profil', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }

    public function updatedataprofil(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        $user = User::findOrFail(Auth::id());
        $user->nama =  $request->nama;
        $user->username =  $request->username;
        $user->email =  $request->email;
        $user->no_hp =  $request->no_hp;
        $user->tgl_lahir =  $request->tgl_lahir;
        $user->alamat =  $request->alamat;
        $user->jenis_kelamin =  $request->jenis_kelamin;
        $user->save();
        Toastr::success('Tersimpan', 'Perubahan', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }

    public function updatepassword(Request $request)
   {
       $this->validate($request,[
       'old_password' => 'required',
       'password' => 'required|confirmed',
   ]);
   $hashedValue = Auth::user()->password;
   if (Hash::check($request->old_password, $hashedValue))
   {
            if (!Hash::check($request->password, $hashedValue))
            {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Toastr::success('Berhasil di Ubah', 'Password', ["positionClass" => "toast-bottom-right"]);
                // Auth::logout();
                return redirect()->back();
            } else {
                Toastr::error('kata sandi baru tidak boleh sama dengan kata sandi lama', 'Password Error', ["positionClass" => "toast-bottom-right"]);
                return redirect()->back();
            }
   }else {
    Toastr::error('kata sandi tidak cocok', 'Password Error', ["positionClass" => "toast-bottom-right"]);
    return redirect()->back();
   }
   }
}

