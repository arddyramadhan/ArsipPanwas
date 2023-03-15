<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Jurusan;
use App\Models\Pegawai;
use App\Models\Program_studi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    private $nav_jenis;
    public function __construct()
    {
        $this->nav_jenis = Jenis::get();
    }
    public function index()
    {
        $nav_jenis = $this->nav_jenis;
        $data = Pegawai::get();
        return view('pegawai.index', compact('nav_jenis','data'));
    }

    public function jabatan()
    {
        $data = Pegawai::orderBy('created')->get();
        $jurusan = Jurusan::get();
        $nav_jenis = $this->nav_jenis;
        return view('jabatan.index', compact('nav_jenis','data', 'jurusan'));
    }

    public function show(Pegawai $pegawai)
    {
        $nav_jenis = $this->nav_jenis;
        return view('pegawai.show', compact('nav_jenis','pegawai'));
    }
    public function delete(Pegawai $pegawai)
    {
    // dd($pegawai);
    $pegawai->user->delete();
        return back();
    }

    public function resetPassword(Pegawai $pegawai)
    {
        $pegawai->user->update([
            'username' => $pegawai->nip,
            'password' => Hash::make($pegawai->nip),
        ]);
        return back();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'nip' => 'required',
            'nidn' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'pendidikan' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
            'status' => 'required',
        ]);
        // $user
        Pegawai::create($data);
        return back();
    }

    public function storeDosen(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'nip' => 'required',
            'nidn' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'pendidikan' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
        ]);
        $data['jurusan_id'] = $request->jurusan_id;
        $data['status'] = 'dosen';
        $user = User::create([
            'username' => $request->username ?? $request->nip,
            'password' => Hash::make($request->password) ?? Hash::make($request->nip),
            'email' => $request->email,
        ]);
        if ($request->akses == 'dosen') {
            $user->assignRole('dosen');
        } else {
            $user->assignRole('operator');
        }
        if ($request->foto) {
            $getphoto = $request->foto;
            $imageName = rand() . '.' . $getphoto->getClientOriginalExtension();
            $getphoto->move(public_path('foto'), $imageName);
            $user->update([
                'foto' => '/foto/' . $imageName,
            ]);
        };
        $data['user_id'] = $user->id;
        Pegawai::create($data);
        return back();
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $data = $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'nip' => 'required',
            'nidn' => 'required',
            'tgl_lahir' => 'required',
            'pendidikan' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
        ]);
        $data['tempat_lahir'] = $request->tempat_lahir;
        if($request->jurusan_id) {
            $data['jurusan_id'] = $request->jurusan_id;
        }
        if ($request->foto) {
            $getphoto = $request->foto;
            $imageName = rand() . '.' . $getphoto->getClientOriginalExtension();
            $getphoto->move(public_path('foto'), $imageName);
            $pegawai->user->update([
                'foto' => '/foto/' . $imageName,
            ]);
        };
        $pegawai->update($data);
        return back();
    }

    public function ubahRole(Pegawai $pegawai)
    {
        if ($pegawai->user->hasRole('operator')){
            $pegawai->user->removeRole('operator');
            $pegawai->user->assignRole('dosen');
        }else {
            $pegawai->user->removeRole('dosen');
            $pegawai->user->assignRole('operator');
        }
        return back();
    }

    public function storeOperator(Request $request)
    {
        // return $request->jurusan_id;
        $data = $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'nip' => 'required',
            'nidn' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'pendidikan' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
            'jurusan_id' => 'required',
        ]);
        $data['status'] = 'operator';
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('operator');
        if ($request->foto) {
            $getphoto = $request->foto;
            $imageName = rand() . '.' . $getphoto->getClientOriginalExtension();
            $getphoto->move(public_path('foto'), $imageName);
            $user->update([
                'foto' => '/foto/' . $imageName,
            ]);
        };
        $data['user_id'] = $user->id;
        Pegawai::create($data);
        return back();
    }

}
