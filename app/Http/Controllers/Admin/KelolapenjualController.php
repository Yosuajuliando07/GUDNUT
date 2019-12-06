<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelolapenjualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id', 2)->get();
        return view('admin.kelolauser.index-penjual', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kelolauser.tambah-penjual');
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
            'nama' => 'required','string', 'max:255',
            'username' => 'required','unique:users',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'no_hp' => 'required|numeric','unique:users','min:12','max:15',
            'alamat' => 'required', 'string', 'max:255','min:25',
            'jenis_kelamin' => 'required',
            'role_id' => 'required',
            'tgl_lahir' => 'required',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);
        $users = new User();
        $users->nama = $request->nama;
        $users->username = $request->username;
        $users->email = $request->email;
        $users->no_hp = $request->no_hp;
        $users->tgl_lahir = $request->tgl_lahir;
        $users->alamat = $request->alamat;
        $users->jenis_kelamin = $request->jenis_kelamin;
        $users->role_id = $request->role_id;
        $users->password = bcrypt($request->password);
        $users->save();
        Toastr::success('Berhasil di Tambah', 'Penjual', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('penjual.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        return view('admin.kelolauser.show-penjual', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('admin.kelolauser.edit-penjual', compact('users'));
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
            'nama' => 'required','string', 'max:255',
            'username' => 'required','unique:users',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'no_hp' => 'required|numeric','unique:users','min:12','max:15',
            'alamat' => 'required', 'string', 'max:255','min:25',
            'jenis_kelamin' => 'required',
            'role_id' => 'required',
            'tgl_lahir' => 'required',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);
        $users = User::find($id);
        $users->nama = $request->nama;
        $users->username = $request->username;
        $users->email = $request->email;
        $users->no_hp = $request->no_hp;
        $users->alamat = $request->alamat;
        $users->jenis_kelamin = $request->jenis_kelamin;
        $users->tgl_lahir = $request->tgl_lahir;
        $users->role_id = $request->role_id;
        $users->password = bcrypt($request->password);
        $users->save();
        Toastr::success('Berhasil di Edit', 'Penjual', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('penjual.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        Toastr::success('Berhasil Di Hapus', 'Penjual', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }
}
