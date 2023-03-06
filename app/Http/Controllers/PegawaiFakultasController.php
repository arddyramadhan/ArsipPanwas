<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Jurusan;
use App\Models\Pegawai;
use App\Models\Pegawai_fakultas;
use Illuminate\Http\Request;

class PegawaiFakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::first();
        $pegawai_fakultas = Pegawai_fakultas::get();
        $pegawai = Pegawai::get();
        $data = Pegawai_fakultas::get();
        return view('pegawai_fakultas.index', compact('data', 'fakultas', 'pegawai_fakultas', 'pegawai'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pegawai_id' => 'required',
            'jabatan' => 'required',
            'status' => 'required'
            // 'jurusan_id'=> 'required',
        ]);
        $data['urutan']= $request->urutan;
        $data['fakultas_id']= 1;
        $pegawai_fakultas = Pegawai_fakultas::create($data);
        if ($request->status == 'aktiv') {
            Pegawai_fakultas::where('id' , '!=', $pegawai_fakultas->id)->update([
                'status'=> 'tidak'
            ]);
        }
        return back();
    }

    public function set(Pegawai_fakultas $pegawai_fakultas)
    {
        $pegawai_fakultas->update([
            'status' => 'aktiv'
        ]);
        Pegawai_fakultas::where('id', '!=', $pegawai_fakultas->id)->update([
            'status' => 'tidak'
        ]);

        return back();
    }

    public function delete(Pegawai_fakultas $pegawai_fakultas)
    {
        $pegawai_fakultas->delete();
        return back();
    }

    public function update(Request $request, Pegawai_fakultas $pegawai_fakultas)
    {
        $data = $request->validate([
            'pegawai_id' => 'required',
            'jabatan' => 'required',
            'status' => 'required'
            // 'jurusan_id'=> 'required',
        ]);
        $data['urutan'] = $request->urutan;
        $data['fakultas_id'] = 1;
        $pegawai_fakultas->update($data);
        return back();
    }
}
