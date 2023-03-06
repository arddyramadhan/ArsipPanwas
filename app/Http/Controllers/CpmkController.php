<?php

namespace App\Http\Controllers;

use App\Models\Bentuk;
use App\Models\Karakteristik;
use App\Models\Metode_pembelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CpmkController extends Controller
{
    public function index()
    {
        $karakteristik = Karakteristik::with('jurusan')->where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        $bentuk = Bentuk::with('jurusan')->where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        $metode_pembelajaran = Metode_pembelajaran::with('jurusan')->where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        return view('cpmk.index', compact('karakteristik', 'bentuk', 'metode_pembelajaran'));
    }
}
