<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function sinkron()
    {
        $api = 'https://apisidapro.fsb.ung.ac.id/api/department';
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $api);
        // $res = json_decode($response->getBody(), false);
        // $jurusan_sidapro = (object) $res;
        $jurusan_sidapro = json_decode($response->getBody(), false);
        // return $jurusan_sidapro;
        $data = Pegawai::get();
        $jurusan = Jurusan::get();
        return view('sinkron.index', compact('data', 'jurusan', 'jurusan_sidapro'));
    }

    public function cekSinkron(Request $request)
    {
        $api = 'https://apisidapro.fsb.ung.ac.id/api/personnel/byDepartment/'.$request->jurusan_sidapro;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $api);
        $personnel_sidapro = json_decode($response->getBody(), false);
        $pegawai = Pegawai::where('jurusan_id',$request->jurusan_id);
        $data = [];
        $data_pegawai= [];
        foreach ($personnel_sidapro->data as $no => $item) {
            $no++;
            if ($item->department_id->id == $request->jurusan_sidapro) {
                if (Pegawai::where('nama', $item->fullname )->count() < 1) {
                    // $user = User::create([
                    //     'username' => $item->user_id->username ?? $item->nip,
                    //     'password' => Hash::make($item->user_id->username) ?? Hash::make($item->nip),
                    //     'email' => $item->user_id->username ?? '-',
                    // ]);
                    // $user->assignRole('dosen');
                    $data_pegawai = [
                        'nama' => $item->fullname,
                        'jk' => $item->sex == 'male' ? 'L' : 'P',
                        'nip' => $item->nip,
                        'nidn' => $item->nidn,
                        'email' => $item->user_id->email,
                        'tgl_lahir' => $item->birthdate,
                        'tempat_lahir' => $item->birthplace,
                        'pendidikan' => $item->education,
                        'alamat' => $item->address,
                        'hp' => $item->handphone,
                    ];
                    $data_pegawai['jurusan_id'] = $request->jurusan_id;
                    // $data_pegawai['user_id'] = $user->id;
                    // Pegawai::create($data_pegawai);
                    array_push($data, $data_pegawai);
                }
            }
            // if($no>10){
            //     break;
            // }
        }
        // $personnel_sidapro = json_decode($data, false);
        $jurusan_id = $request->jurusan_id;
        $jurusan_sidapro = $request->jurusan_sidapro;
        return view('sinkron.index_jurusan', compact('data', 'jurusan_sidapro', 'jurusan_id'));
        // return back();
    }

    public function sinkron_sekarang(Request $request)
    {
        $api = 'https://apisidapro.fsb.ung.ac.id/api/personnel/byDepartment/'.$request->jurusan_sidapro;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $api);
        $personnel_sidapro = json_decode($response->getBody(), false);
        $pegawai = Pegawai::where('jurusan_id',$request->jurusan_id);
        $data = [];
        $data_pegawai= [];
        foreach ($personnel_sidapro->data as $no => $item) {
            $no++;
            if ($item->department_id->id == $request->jurusan_sidapro) {
                if (Pegawai::where('nama', $item->fullname )->count() < 1) {
                    $user = User::create([
                        'username' => $item->user_id->username ?? $item->nip,
                        'password' => Hash::make($item->user_id->username) ?? Hash::make($item->nip),
                        'email' => $item->user_id->username ?? '-',
                    ]);
                    $user->assignRole('dosen');
                    $data_pegawai = [
                        'nama' => $item->fullname,
                        'jk' => $item->sex == 'male' ? 'L' : 'P',
                        'nip' => $item->nip,
                        'nidn' => $item->nidn,
                        'email' => $item->user_id->email,
                        'tgl_lahir' => $item->birthdate,
                        'tempat_lahir' => $item->birthplace,
                        'pendidikan' => $item->education,
                        'alamat' => $item->address,
                        'hp' => $item->handphone,
                    ];
                    $data_pegawai['jurusan_id'] = $request->jurusan_id;
                    $data_pegawai['user_id'] = $user->id;
                    Pegawai::create($data_pegawai);
                    // array_push($data, $data_pegawai);
                }
            }
        }
        // $jurusan_id = $request->jurusan_id;
        // $jurusan_sidapro = $request->jurusan_sidapro;
        // return view('sinkron.index_jurusan', compact('data', 'jurusan_sidapro', 'jurusan_id'));
        return redirect('/pegawai');
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
}
