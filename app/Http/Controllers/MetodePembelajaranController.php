<?php

namespace App\Http\Controllers;

use App\Models\Metode_pembelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MetodePembelajaranController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            // 'jurusan_id'=> 'required',
        ]);
        $data['nama'] = ucfirst($request->nama);
        $data['jurusan_id'] = $request->jurusan_id ?? Auth::user()->pegawai->jurusan_id;
        Metode_pembelajaran::create($data);
        return back();
    }

    public function delete(Metode_pembelajaran $metode_pembelajaran)
    {
        $metode_pembelajaran->delete();
        return back();
    }

    public function update(Request $request, Metode_pembelajaran $metode_pembelajaran)
    {
        $metode_pembelajaran->update([
            'nama' => $request->nama,
            'jurusan_id' => $request->jurusan_id ?? Auth::user()->pegawai->jurusan_id
        ]);
        return back();
    }
}
