<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelolaadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if(Auth::user()->id > 1 ) {
        //     Toastr::success('Hanya Dapat Diakses Admin Utama ', 'Maaf', ["positionClass" => "toast-bottom-right"]);
        //     return redirect()->back();
        //      }
        $users = User::where('role_id', 1)->get();
        return view('admin.kelolauser.index-admin', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kelolauser.tambah-admin');
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
            'tgl_lahir' => 'required',
            'role_id' => 'required',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);
        $users = new User();
        $users->nama = $request->nama;
        $users->username = $request->username;
        $users->email = $request->email;
        $users->no_hp = $request->no_hp;
        $users->alamat = $request->alamat;
        $users->jenis_kelamin = $request->jenis_kelamin;
        $users->tgl_lahir = $request->tgl_lahir;
        $users->role_id = $request->role_id;
        // Hash
        $users->password = bcrypt($request->password);
        $users->save();
        Toastr::success('Berhasil di Tambah', 'Admin', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.index');
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
        return view('admin.kelolauser.show-admin', ['users' => $users]);
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
        return view('admin.kelolauser.edit-admin', compact('users'));
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
            'tgl_lahir' => 'required',
            'role_id' => 'required',
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
        // Hash
        $users->password = bcrypt($request->password);
        $users->save();
        Toastr::success('Berhasil di Edit', 'Admin', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.index');
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
        Toastr::success('Berhasil Di Hapus', 'Admin', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }
}
