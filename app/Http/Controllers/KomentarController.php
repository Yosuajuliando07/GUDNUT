<?php

namespace App\Http\Controllers;

use App\Komentar;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    public function store(Request $request, $blog)
    {
        $this->validate($request, [
            'komentar' => 'required',
        ]);
        $komentar = new Komentar();
        $komentar->blog_id = $blog;
        $komentar->user_id = Auth::id();
        $komentar->komentar = $request->komentar;
        $komentar->save();
        Toastr::success('Terkirim', 'Komentar', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();

    }
}
