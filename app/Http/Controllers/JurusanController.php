<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $data = Jurusan::get();
        return view('jurusan.index', compact('data'));
    }

    public function show(Jurusan $jurusan)
    {
        return view('jurusan.show', compact('jurusan'));
    }

    public function delete(Jurusan $jurusan)
    {
        $jurusan->delete();
        return back();
    }

    public function update(Request $request,Jurusan $jurusan)
    {

        $jurusan->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenjang' => $request->jenjang,
            'fakultas_id' => Fakultas::first()->id
        ]);
        return back();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenjang' => 'required',
        ]);
        $data['fakultas_id'] = Fakultas::first()->id;
        Jurusan::create($data);
        return back();
    }
}
