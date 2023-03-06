<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Program_studi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramStudiController extends Controller
{
    public function index()
    {
        $data = Program_studi::with('jurusan')->where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        return view('program_studi.index', compact('data'));
    }

    public function show(Program_studi $program_studi)
    {
        return view('program_studi.show', compact('program_studi'));
    }

    public function cetak(Program_studi $program_studi)
    {
        return view('pdf.informasi_prodi', compact('program_studi'));
    }

    public function store(Request $request)
    {
        // return 'coba';
        // return $request;
        // return $request->bulan_tahun_prodi . '-' . date('d');
        $data = $request->validate([
            'nama' => 'required',
            'kode' => 'required',
            'akreditas' => 'required',
            'tgl_berdiri' => 'required',
            'penandatangan_sk' => 'required',
            'bulan_tahun_prodi' => 'required',
            'sk_penyelenggaraan' => 'required',
            'alamat' => 'required',
            'pos' => 'required',
            'tlp' => 'required',
            'fax' => 'required',
            'email' => 'required',
            'web' => 'required',
            'deskripsi' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'kompetensi_lulusan' => 'required',
            'tujuan_prodi' => 'required',
            'strategi_pencapaian' => 'required',
            // 'jurusan_id'=> 'required',
        ]);
        // $data['bulan_tahun_prodi'] = date();
        $data['bulan_tahun_prodi'] = $request->bulan_tahun_prodi.'-'.date('d');
        $data['jurusan_id'] = $request->jurusan_id ?? Auth::user()->pegawai->jurusan_id;
        Program_studi::create($data);
        return back();
    }
    public function delete(Program_studi $program_studi)
    {
        $program_studi->delete();
        return back();
    }

    public function update(Request $request, Program_studi $program_studi)
    {
        $data = $request->validate([
            'nama' => 'required',
            'kode' => 'required',
            'akreditas' => 'required',
            'tgl_berdiri' => 'required',
            'penandatangan_sk' => 'required',
            'bulan_tahun_prodi' => 'required',
            'sk_penyelenggaraan' => 'required',
            'alamat' => 'required',
            'pos' => 'required',
            'tlp' => 'required',
            'fax' => 'required',
            'email' => 'required',
            'web' => 'required',
            'deskripsi' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'kompetensi_lulusan' => 'required',
            'tujuan_prodi' => 'required',
            'strategi_pencapaian' => 'required',
            // 'jurusan_id'=> 'required',
        ]);
        // $data['bulan_tahun_prodi'] = date();
        $data['bulan_tahun_prodi'] = $request->bulan_tahun_prodi . '-' . date('d');
        $program_studi->update($data);
        return back();
    }
}
