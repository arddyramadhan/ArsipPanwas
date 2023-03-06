<?php

namespace App\Http\Controllers;

use App\Models\Profil_lulusan;
use Illuminate\Http\Request;

class ProfilLulusanController extends Controller
{
    public function index()
    {
        $data = Profil_lulusan::orderBy('urutan', 'asc')->get();
        return view('profil_lulusan.index', compact('data'));
    }
    public function show(Profil_lulusan $profil_lulusan)
    {
        return view('profil_lulusan.show', compact('profil_lulusan'));
    }
    public function delete(Profil_lulusan $profil_lulusan)
    {
        $profil_lulusan->delete();
        return back();
    }
    public function update(Request $request, Profil_lulusan $profil_lulusan)
    {
        $profil_lulusan->update([
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
            'singkatan' => 'required',
        ]);
        $data['singkatan'] = strtoupper($request->singkatan);
        $data['urutan'] = Profil_lulusan::count()+1;
        Profil_lulusan::create($data);
        return back();
    }
}
