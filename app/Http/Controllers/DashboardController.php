<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Jurusan;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    private $nav_jenis;
    public function __construct()
    {
        $this->nav_jenis = Jenis::get();
    }
    public function index()
    {
        $nav_jenis= $this->nav_jenis;
        return view('dashboard', compact('nav_jenis'));
    }
}
