<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kurikulum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KurikulumController extends Controller
{
    public function index()
    {
        if (Auth::user()->pegawai->status == 'operator') {
            $data = Kurikulum::with('jurusan')->where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        } else {
            $data = Kurikulum::with('jurusan')->get();
        }
        $jurusan = Jurusan::get();
        return view('kurikulum.index', compact('data', 'jurusan'));
    }

    public function show(Kurikulum $kurikulum)
    {
        return view('kurikulum.show', compact('kurikulum'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            // 'jurusan_id'=> 'required',
        ]);
        $data['jurusan_id'] = $request->jurusan_id ?? Auth::user()->pegawai->jurusan_id;
        Kurikulum::create($data);
        return back();
    }
    public function delete(Kurikulum $kurikulum)
    {
        $kurikulum->delete();
        return back();
    }

    public function update(Request $request, Kurikulum $kurikulum)
    {
        $kurikulum->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'jurusan_id' => $request->jurusan_id ?? Auth::user()->pegawai->jurusan_id
        ]);
        return back();
    }
}
