<?php

namespace App\Http\Controllers;

use App\Models\Karakteristik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KarakteristikController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            // 'jurusan_id'=> 'required',
        ]);
        $data['nama']= ucfirst($request->nama);
        $data['jurusan_id'] = $request->jurusan_id ?? Auth::user()->pegawai->jurusan_id;
        Karakteristik::create($data);
        return back();
    }
    public function delete(Karakteristik $karakteristik)
    {
        $karakteristik->delete();
        return back();
    }

    public function update(Request $request, Karakteristik $karakteristik)
    {
        $karakteristik->update([
            'nama' => $request->nama,
            'jurusan_id' => $request->jurusan_id ?? Auth::user()->pegawai->jurusan_id
        ]);
        return back();
    }
}
