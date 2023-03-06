<?php

namespace App\Http\Controllers;

use App\Models\Bentuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BentukController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            // 'jurusan_id'=> 'required',
        ]);
        $data['nama'] = ucfirst($request->nama);
        $data['jurusan_id'] = $request->jurusan_id ?? Auth::user()->pegawai->jurusan_id;
        Bentuk::create($data);
        return back();
    }
    
    public function delete(Bentuk $bentuk)
    {
        $bentuk->delete();
        return back();
    }

    public function update(Request $request, Bentuk $bentuk)
    {
        $bentuk->update([
            'nama' => $request->nama,
            'jurusan_id' => $request->jurusan_id ?? Auth::user()->pegawai->jurusan_id
        ]);
        return back();
    }
}
