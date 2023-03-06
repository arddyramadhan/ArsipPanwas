<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pegawai_jurusan;
use App\Models\Pegawai_prodi;
use App\Models\Program_studi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class PegawaiJurusanController extends Controller
{
    public function index()
    {
        $pegawai_jurusan = Pegawai_jurusan::get();
        $pegawai = Pegawai::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        $data_jurusan = Pegawai_jurusan::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        $data_prodi = Pegawai_prodi::join('program_studi', 'program_studi.id', '=', 'pegawai_prodi.program_studi_id')
        ->select('pegawai_prodi.*', 'program_studi.jurusan_id')
        ->where('program_studi.jurusan_id', Auth::user()->pegawai->jurusan_id)
        ->get();
        // $data_prodi = Pegawai_prodi::with('program_studi',  function(Builder $query){
        //     $query->where('jurusan_id', Auth::user()->pegawai->jurusan_id);
        // })->get();
        $program_studi = Program_studi::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        return view('pegawai_jurusan.index', compact('data_jurusan',  'pegawai_jurusan','data_prodi', 'pegawai', 'program_studi'));
    }

    public function storejurusan(Request $request)
    {
        $data = $request->validate([
            'pegawai_id' => 'required',
            'jabatan' => 'required',
            'status' => 'required'
            // 'jurusan_id'=> 'required',
        ]);
        $data['jurusan_id'] = Auth::user()->pegawai->jurusan_id;
        $pegawai_jurusan = Pegawai_jurusan::create($data);
        if ($request->status == 'aktiv') {
            Pegawai_jurusan::where('id', '!=', $pegawai_jurusan->id)->update([
                'status' => 'tidak'
            ]);
        }
        return back();
    }

    public function storeprodi(Request $request)
    {
        $data = $request->validate([
            'pegawai_id' => 'required',
            'status' => 'required',
            'program_studi_id' => 'required'
            // 'jurusan_id'=> 'required',
        ]);
        $pegawai_prodi = Pegawai_prodi::create($data);
        // if ($request->status == 'aktiv') {
        //     Pegawai_prodi::where('id', '!=', $pegawai_prodi->id)->update([
        //         'status' => 'tidak'
        //     ]);
        // }
        return back();
    }

    public function setjurusan(Pegawai_jurusan $pegawai_jurusan)
    {
        if ($pegawai_jurusan->status == 'aktiv') {
            $pegawai_jurusan->update([
                'status' => 'tidak'
            ]);
        }else{
            $pegawai_jurusan->update([
                'status' => 'aktiv'
            ]);
        }
        return back();
    }

    public function setprodi(Pegawai_prodi $pegawai_prodi)
    {
        if ($pegawai_prodi->status == 'aktiv') {
            $pegawai_prodi->update([
                'status' => 'tidak'
            ]);
        }else{
            $pegawai_prodi->update([
                'status' => 'aktiv'
            ]);
        }
        return back();
    }

    public function deletejurusan(Pegawai_jurusan $pegawai_jurusan)
    {
        $pegawai_jurusan->delete();
        return back();
    }

    public function deleteprodi(Pegawai_prodi $pegawai_prodi)
    {
        $pegawai_prodi->delete();
        return back();
    }
}
