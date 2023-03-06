<?php

namespace App\Http\Controllers;

use App\Models\Capaian_lulusan;
use App\Models\Profil_jurusan;
use App\Models\Profil_lulusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilJurusanController extends Controller
{
    public function index()
    {
        $capaian_lulusan = Capaian_lulusan::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->orderBy('profil_lulusan_id', 'asc')->get();
        $data = Profil_jurusan::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->orderBy('urutan', 'asc')->get();
        return view('profil_jurusan.index', compact('data', 'capaian_lulusan'));
    }

    public function show(Profil_jurusan $profil_jurusan)
    {
        return view('profil_jurusan.show', compact('profil_jurusan'));
    }

    public function cetak()
    {
        $profil_jurusan= Profil_jurusan::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        $profil_lulusan = Profil_lulusan::get();
        return view('pdf.profil_jurusan', compact('profil_jurusan', 'profil_jurusan'));
    }

    public function delete(Profil_jurusan $profil_jurusan)
    {
        $profil_jurusan->delete();
        return back();
    }

    public function update(Request $request, Profil_jurusan $profil_jurusan)
    {
        $profil_jurusan->update([
            'nama' => $request->nama,
            'singkatan' => $request->singkatan,
            'urutan' => $request->urutan,
        ]);
        return back();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);
        $data['jurusan_id']= Auth::user()->pegawai->jurusan_id;
        $data['urutan'] = Profil_jurusan::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->count() + 1;
        $profil_jurusan = Profil_jurusan::create($data);
        if ($profil_jurusan->profil_jurusan_capaian->count() > 0) {
            $profil_jurusan->profil_jurusan_capaian()->delete();
            $profil_jurusan->capaian_lulusan()->attach($request->capaian_lulusan);
        } else {
            $profil_jurusan->capaian_lulusan()->attach($request->capaian_lulusan);
        }
        return back();
    }
}
