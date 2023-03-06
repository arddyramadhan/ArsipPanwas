<?php
namespace App\Http\Controllers;

use App\Models\Bentuk;
use App\Models\Karakteristik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LuringController extends Controller
{
    public function index()
    {
        $karakteristik = Karakteristik::with('jurusan')->where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        $bentuk = Bentuk::with('jurusan')->where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        // $karakteristik = Karakteristik::with('jurusan')->where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        return view('luring.index', compact('karakteristik','bentuk'));
    }
}
