<?php

namespace App\Http\Controllers;

use App\Models\Capaian_lulusan;
use App\Models\Jurusan;
use App\Models\Profil_lulusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CapaianLulusanController extends Controller
{
    public function index()
    {
        $parameter = Capaian_lulusan::where('jurusan_id', Auth::user()->pegawai->jurusan_id);
        $data = Capaian_lulusan::with('jurusan', 'profil_lulusan')
        ->join('profil_lulusan', 'profil_lulusan.id', '=', 'capaian_lulusan.profil_lulusan_id')
        ->select('capaian_lulusan.*', 'profil_lulusan.urutan as profil_urut')
        ->when(Auth::user()->hasRole('operator'), function ($data) {
            $data = $data->where('jurusan_id', Auth::user()->pegawai->jurusan_id);
        })
        ->orderBy('profil_urut', 'ASC')
        ->orderBy('capaian_lulusan.urutan', 'ASC')
        ->get();
        $profil_lulusan = Profil_lulusan::get();
        return view('capaian_lulusan.index', compact('data', 'profil_lulusan', 'parameter'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'profil_lulusan_id' => 'required',
            'deskripsi' => 'required',
        ]);
        $data['jurusan_id'] = Auth::user()->pegawai->jurusan_id;
        $data['urutan'] = Capaian_lulusan::where('jurusan_id', $data['jurusan_id'])->where('profil_lulusan_id', $request->profil_lulusan_id)->count() + 1;
        Capaian_lulusan::create($data);
        return back();
    }

    public function delete(Capaian_lulusan $capaian_lulusan)
    {
        $jurusan = $capaian_lulusan->jurusan_id;
        $profil_lulusan = $capaian_lulusan->profil_lulusan_id;
        $capaian = Capaian_lulusan::where('jurusan_id',  $jurusan)->where('profil_lulusan_id', $profil_lulusan);
        $capaian_lulusan->delete();
        if ($capaian->count() > 0) {
            foreach ($capaian->orderBy('urutan', 'ASC')->get() as $no => $item) {
                $item->update(['urutan' => ++$no]);
            }
        }
        return back();
    }

    public function update(Request $request, Capaian_lulusan $capaian_lulusan)
    {
        if ($capaian_lulusan->urutan != $request->urutan) {
            $sebelum = Capaian_lulusan::where('jurusan_id',  $capaian_lulusan->jurusan_id)->where('profil_lulusan_id', $capaian_lulusan->profil_lulusan_id)->where('urutan', $request->urutan);
            if($sebelum->count() > 0){
                $sebelum->first()->update([
                    'urutan' => $capaian_lulusan->urutan
                ]);
                $capaian_lulusan->update([
                    'deskripsi' => $request->deskripsi,
                    'urutan' => $request->urutan,
                ]);
            }else{
                session()->flash('session', 'Urutan tidak valid');
            }
        }
        else{
            $capaian_lulusan->update([
                'deskripsi' => $request->deskripsi,
                'urutan' => $request->urutan,
            ]);
        }
        return back();
    }
}
