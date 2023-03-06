<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JenisController extends Controller
{
    public function index()
    {
        // if (Auth::user()->pegawai->status == 'operator') {
        //     $data = Rumpun::with('jurusan')->where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        // } else {
        //     $data = Rumpun::with('jurusan')->get();
        // }
        $data = Jenis::get();
        return view('jenis.index', compact('data'));
    }
    
    public function show(Jenis $jenis)
    {
        return view('jenis.show', compact('jenis'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            // 'jurusan_id'=> 'required',
        ]);
        // $data['jurusan_id'] = $request->jurusan_id ?? Auth::user()->pegawai->jurusan_id;
        Jenis::create($data);
        return back();
    }
    public function delete(Jenis $jenis)
    {
        $jenis->delete();
        return back();
    }

    public function update(Request $request, Jenis $jenis)
    {
        $jenis->update([
            'nama' => $request->nama,
        ]);
        return back();
    }
}
