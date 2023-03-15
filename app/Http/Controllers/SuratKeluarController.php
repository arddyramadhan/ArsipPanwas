<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Surat_keluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratKeluarController extends Controller
{
    private $nav_jenis;
    public function __construct()
    {
        $this->nav_jenis = Jenis::get();
    }
    public function index()
    {
        $nav_jenis = $this->nav_jenis;
        $data = Surat_keluar::orderBy('created_at', 'desc')->get();
        return view('surat_keluar.index', compact('nav_jenis', 'data'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'nomor' => 'required',
            'lampiran' => 'required',
            'kepada' => 'required',
            'isi' => 'required',
            'tgl_surat' => 'required',
            'waktu' => 'required',
            'tembusan' => 'required',
        ]);
        $surat_keluar = Surat_keluar::create($data);
        // if ($request->file) {
        //     $getphoto = $request->file;
        //     $imageName = rand() . '.' . $getphoto->getClientOriginalExtension();
        //     $getphoto->move(public_path('file'), $imageName);
        //     $surat_keluar->update([
        //         'file' => '/file/' . $imageName,
        //     ]);
        // };
        return back();
    }

    public function delete(Surat_keluar $surat_keluar)
    {
        $surat_keluar->delete();
        return back();
    }

    public function show(Surat_keluar $surat_keluar)
    {
        $nav_jenis = $this->nav_jenis;
        return view('surat_keluar.show', compact('nav_jenis', 'surat_keluar'));
    }

    public function update(Request $request, Surat_keluar $surat_keluar)
    {
        $data = $request->validate([
            'nomor' => 'required',
            'lampiran' => 'required',
            'kepada' => 'required',
            'isi' => 'required',
            'tgl_surat' => 'required',
            'waktu' => 'required',
            'tembusan' => 'required',
        ]);
        $surat_keluar->update($data);
        // if ($request->file) {
        //     $getphoto = $request->file;
        //     $imageName = rand() . '.' . $getphoto->getClientOriginalExtension();
        //     $getphoto->move(public_path('file'), $imageName);
        //     $surat_keluar->update([
        //         'file' => '/file/' . $imageName,
        //     ]);
        // };
        return back();
    }
}
