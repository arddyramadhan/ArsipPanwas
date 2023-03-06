<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Rumpun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RumpunController extends Controller
{
    public function index()
    {
        if (Auth::user()->pegawai->status == 'operator') {
            $data = Rumpun::with('jurusan')->where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        } else {
            $data = Rumpun::with('jurusan')->get();
        }
        $jurusan = Jurusan::get();
        return view('rumpun.index', compact('data', 'jurusan'));
    }

    public function show(Rumpun $rumpun)
    {
        return view('rumpun.show', compact('rumpun'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'singkatan' => 'required',
            // 'jurusan_id'=> 'required',
        ]);
        $data['jurusan_id'] = $request->jurusan_id ?? Auth::user()->pegawai->jurusan_id;
        Rumpun::create($data);
        return back();
    }
    public function delete(Rumpun $rumpun)
    {
        $rumpun->delete();
        return back();
    }

    public function update(Request $request, Rumpun $rumpun)
    {
        $rumpun->update([
            'nama' => $request->nama,
            'singkatan' => $request->singkatan,
            'jurusan_id' => $request->jurusan_id ?? Auth::user()->pegawai->jurusan_id
        ]);
        return back();
    }
}
