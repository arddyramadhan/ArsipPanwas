<?php

namespace App\Http\Controllers;

use App\Models\Capaian_lulusan;
use App\Models\Profil_lulusan;
use App\Models\Profil_prodi;
use App\Models\Program_studi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilProdiController extends Controller
{
    public function index()
    {
        $capaian_lulusan = Capaian_lulusan::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->orderBy('profil_lulusan_id', 'asc')->get();
        $program_studi = Program_studi::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        $data = Profil_prodi::join('program_studi', 'program_studi.id', '=', 'profil_prodi.program_studi_id')
        // with('program_studi', function($q){
        //     $q->where('jurusan_id', Auth::user()->pegawai->jurusan_id);
        // })
        ->select('profil_prodi.*')
        ->where('program_studi.jurusan_id', Auth::user()->pegawai->jurusan_id)
        ->orderBy('program_studi_id', 'asc')
        ->orderBy('urutan', 'asc')
        ->get();
        return view('profil_prodi.index', compact('data', 'capaian_lulusan', 'program_studi'));
    }

    public function cetak(Request $request)
    {
        $prodi = Program_studi::find($request->program_studi_id);
        $profil_prodi = Profil_prodi::where('program_studi_id', $request->program_studi_id)->orderBy('urutan', 'asc')->get();
        $profil_lulusan = Profil_lulusan::get();
        // return $prodi->jurusan_id;
        $capaian_lulusan= Capaian_lulusan::join('profil_lulusan', 'profil_lulusan.id', '=', 'capaian_lulusan.profil_lulusan_id')
        ->select('capaian_lulusan.*', 'profil_lulusan.urutan as profil_urutan')
        ->where('jurusan_id', $prodi->jurusan_id)
        ->groupBy('capaian_lulusan.id')
        ->orderBy('profil_urutan', 'asc')
        ->orderBy('urutan', 'asc')

        ->get();

        return view('pdf.profil_prodi', compact('profil_lulusan', 'profil_prodi', 'capaian_lulusan'));
    }

    public function delete(Profil_prodi $profil_prodi)
    {
        $prodi = $profil_prodi->program_studi_id;
        $profil_lulusan = $profil_prodi->profil_lulusan_id;
        $update_profil = Profil_prodi::where('program_studi_id',  $prodi);
        $profil_prodi->delete();
        if ($update_profil->count() > 0) {
            foreach ($update_profil->orderBy('urutan', 'ASC')->get() as $no => $item) {
                $item->update(['urutan' => ++$no]);
            }
        }
        return back();
    }

    public function update(Request $request, Profil_prodi $profil_prodi)
    {
        if ($profil_prodi->urutan != $request->urutan) {
            $sebelum = Profil_prodi::where('program_studi_id',  $profil_prodi->program_studi_id)->where('urutan', $request->urutan);
            if ($sebelum->count() > 0) {
                $sebelum->first()->update([
                    'urutan' => $profil_prodi->urutan
                ]);
                $profil_prodi->update([
                    'nama' => $request->nama,
                    'deskripsi' => $request->deskripsi,
                    'urutan' => $request->urutan,
                ]);
            } else {
                session()->flash('session', 'Urutan tidak valid');
            }
        } else {
            $profil_prodi->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
            ]);
        }
        if ($profil_prodi->profil_prodi_capaian->count() > 0) {
            $profil_prodi->profil_prodi_capaian()->delete();
            $profil_prodi->capaian_lulusan()->attach($request->capaian_lulusan);
        } else {
            $profil_prodi->capaian_lulusan()->attach($request->capaian_lulusan);
        }
        return back();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'program_studi_id' => 'required',
        ]);
        $data['urutan'] = Profil_prodi::where('program_studi_id', $request->program_studi_id)->count() + 1;
        $profil_prodi = Profil_prodi::create($data);
        if ($profil_prodi->profil_prodi_capaian->count() > 0) {
            $profil_prodi->profil_prodi_capaian()->delete();
            $profil_prodi->capaian_lulusan()->attach($request->capaian_lulusan);
        } else {
            $profil_prodi->capaian_lulusan()->attach($request->capaian_lulusan);
        }
        return back();
    }
}
