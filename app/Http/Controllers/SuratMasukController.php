<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Surat_masuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratMasukController extends Controller
{
    private $nav_jenis;
    public function __construct()
    {
        $this->nav_jenis = Jenis::get();
    }
    public function index()
    {
        $nav_jenis = $this->nav_jenis;
        $data = Surat_masuk::orderBy('created_at', 'desc')->get();
        return view('surat_masuk.index', compact('nav_jenis','data'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'nomor' => 'required',
            'tgl_surat' => 'required',
            'asal' => 'required',
            'deskripsi' => 'required',
        ]);
        $data['pegawai_id'] = Auth::user()->pegawai->id;
        $surat_masuk = Surat_masuk::create($data);
        if ($request->file) {
            $getphoto = $request->file;
            $imageName = rand() . '.' . $getphoto->getClientOriginalExtension();
            $getphoto->move(public_path('file'), $imageName);
            $surat_masuk->update([
                'file' => '/file/' . $imageName,
            ]);
        };
        return back();
    }

    public function delete(Surat_masuk $surat_masuk)
    {
        $surat_masuk->delete();
        return back();
    }

    public function show(Surat_masuk $surat_masuk)
    {
        $nav_jenis = $this->nav_jenis;
        return view('surat_masuk.show', compact('nav_jenis','surat_masuk'));
    }

    public function update(Request $request, Surat_masuk $surat_masuk)
    {
        $data = $request->validate([
            'nomor' => 'required',
            'tgl_surat' => 'required',
            'asal' => 'required',
            'deskripsi' => 'required',
        ]);
        $data['pegawai_id'] = Auth::user()->pegawai->id;
        $surat_masuk->update($data);
        if ($request->file) {
            $getphoto = $request->file;
            $imageName = rand() . '.' . $getphoto->getClientOriginalExtension();
            $getphoto->move(public_path('file'), $imageName);
            $surat_masuk->update([
                'file' => '/file/' . $imageName,
            ]);
        };
        return back();
    }
}
