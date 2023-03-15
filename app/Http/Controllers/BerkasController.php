<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerkasController extends Controller
{
    private $nav_jenis;
    public function __construct()
    {
        $this->nav_jenis = Jenis::get();
    }
    public function index()
    {
        $nav_jenis = $this->nav_jenis;
        $data = Berkas::get();
        return view('berkas.index', compact('nav_jenis','data'));
    }

    public function Byjenis(Jenis $jenis_id)
    {
        $nav_jenis = $this->nav_jenis;
        $data = Berkas::where('jenis_id', $jenis_id->id)->get();
        return view('berkas.index', compact('nav_jenis','data', 'jenis_id'));
    }

    public function show(Berkas $berkas)
    {
        $nav_jenis = $this->nav_jenis;
        return view('berkas.show', compact('nav_jenis','berkas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nomor' => 'required',
            'tgl' => 'required',
            'jenis_id' => 'required',
            'deskripsi' => 'required',
        ]);
        $data['pegawai_id'] = Auth::user()->pegawai->id;
        $berkas = Berkas::create($data);
        if ($request->file) {
            $getphoto = $request->file;
            $imageName = rand() . '.' . $getphoto->getClientOriginalExtension();
            $getphoto->move(public_path('file'), $imageName);
            $berkas->update([
                'file' => '/file/' . $imageName,
            ]);
        };
        return back();
    }
    
    public function delete(Berkas $berkas)
    {
        $berkas->delete();
        return back();
    }

    public function update(Request $request, Berkas $berkas)
    {
        $berkas->update([
            'nama' => $request->nama,
            'inputan' => $request->inputan,
        ]);
        return back();
    }
}
