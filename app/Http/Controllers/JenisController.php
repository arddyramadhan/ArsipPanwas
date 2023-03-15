<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JenisController extends Controller
{
    private $nav_jenis;
    public function __construct()
    {
        $this->nav_jenis = Jenis::get();
    }
    public function index()
    {
        $nav_jenis = $this->nav_jenis;
        $data = Jenis::get();
        return view('jenis.index', compact('nav_jenis','data'));
    }

    public function Byjenis()
    {
        $data = Jenis::get();
        $nav_jenis = $this->nav_jenis;
        return view('jenis.index', compact('nav_jenis','data'));
    }
    public function show(Jenis $jenis)
    {
        $nav_jenis = $this->nav_jenis;
        return view('jenis.show', compact('nav_jenis','jenis'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'inputan' => 'required',
        ]);
        Jenis::create($data);
        return back();
    }
    public function delete(Jenis $jenis)
    {
        $jenis->delete();
        return back();
    }

    public function update(Request $request, Jenis $jenis)
    {
        $jenis->update([
            'nama' => $request->nama,
            'inputan' => $request->inputan,
        ]);
        return back();
    }
}
