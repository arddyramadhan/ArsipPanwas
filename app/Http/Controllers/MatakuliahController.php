<?php

namespace App\Http\Controllers;

use App\Models\Bentuk;
use App\Models\Capaian_lulusan;
use App\Models\Jenis;
use App\Models\Jurusan;
use App\Models\Karakteristik;
use App\Models\Kurikulum;
use App\Models\Matakuliah;
use App\Models\Matakuliah_pegawai;
use App\Models\Metode_pembelajaran;
use App\Models\Pegawai;
use App\Models\Profil_lulusan;
use App\Models\Program_studi;
use App\Models\Rumpun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatakuliahController extends Controller
{
    public function index()
    {
        $kurikulum = Kurikulum::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        $program_studi = Program_studi::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        $data = Matakuliah::with(['jenis', 'pegawai', 'pegawai_rps', 'rumpun'])
            ->join('program_studi', 'program_studi.id', '=', 'matakuliah.program_studi_id')
            ->select('matakuliah.*')
            ->where('program_studi.jurusan_id', Auth::user()->pegawai->jurusan_id)
            ->get();
        // $data = Matakuliah::with(['jenis', 'pegawai', 'pegawai_rps', 'rumpun'])->with(['program_studi' => function ($query) {
        //     return $query->where('jurusan_id', Auth::user()->pegawai->jurusan_id);
        // }])->get();
        return view('matakuliah.index', compact('data', 'program_studi', 'kurikulum'));
    }
    // public function index()
    // {
    //     $kurikulum = Kurikulum::get();
    //     if (Auth::user()->pegawai->status == 'operator') {
    //         $program_studi = Program_studi::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
    //         $data = Matakuliah::with('jenis', 'pegawai', 'pegawai_rps', 'rumpun')->with('program_studi', function ($query) {
    //             $query->where('jurusan_id', Auth::user()->pegawai->jurusan_id);
    //         })->get();
    //         return view('matakuliah.index', compact('data', 'program_studi', 'kurikulum'));
    //     } else {
    //         // operator dosen
    //         $program_studi = Program_studi::get();
    //         if (Auth::user()->hasRole('operator') && Auth::user()->pegawai->status == 'dosen') {
    //             $data = Matakuliah::with('jenis', 'pegawai', 'pegawai_rps', 'rumpun', 'program_studi')->get();
    //             return view('matakuliah.index', compact('data', 'program_studi', 'kurikulum'));
    //         }
    //         // dosen only
    //         elseif (Auth::user()->hasRole('operator') && (Auth::user()->pegawai->status == 'dosen')) {
    //             $data = Matakuliah::with('jenis', 'pegawai', 'rumpun', 'program_studi')->where('pegawai_id', Auth::user()->pegawai->id)->get();
    //             return view('matakuliah.index', compact('data', 'program_studi', 'kurikulum'));
    //         }
    //     }
    // }

    public function create()
    {
        $jenis = Jenis::get();
        // if (Auth::user()->pegawai->status == 'operator') {
        $pegawai = Pegawai::where('status', 'dosen')->get();
        $program_studi = Program_studi::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        $rumpun = Rumpun::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        $kurikulum = Kurikulum::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        $data = Matakuliah::with('jenis', 'pegawai', 'rumpun')->join('program_studi', 'program_studi.id', '=', 'matakuliah.program_studi_id')
        ->select('matakuliah.*')
        ->where('program_studi.jurusan_id',Auth::user()->pegawai->jurusan_id)
        ->get();
        return view('matakuliah.create', compact('data', 'jenis', 'rumpun', 'pegawai', 'program_studi', 'kurikulum'));
    }

    public function edit(Matakuliah $matakuliah)
    {
        $jenis = Jenis::get();
        // // if (Auth::user()->pegawai->status == 'operator') {
        $pegawai = Pegawai::where('status', 'dosen')->get();
        $program_studi = Program_studi::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        $rumpun = Rumpun::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        $kurikulum = Kurikulum::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
        // $data = Matakuliah::with('jenis', 'pegawai', 'rumpun')->join('program_studi', 'program_studi.id', '=', 'matakuliah.program_studi_id')
        // ->select('matakuliah.*')
        // ->where('program_studi.jurusan_id',Auth::user()->pegawai->jurusan_id)
        // ->get();
        return view('matakuliah.edit', compact('matakuliah', 'jenis', 'rumpun', 'pegawai', 'kurikulum', 'program_studi'));
    }
    // public function create()
    // {
    //     $jenis = Jenis::get();
    //     if (Auth::user()->pegawai->status == 'operator') {
    //         $pegawai = Pegawai::where('status', 'dosen')->get();
    //         $program_studi = Program_studi::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
    //         $rumpun = Rumpun::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
    //         $kurikulum = Kurikulum::where('jurusan_id', Auth::user()->pegawai->jurusan_id)->get();
    //         $data = Matakuliah::with('jenis', 'pegawai', 'rumpun')->with('program_studi', function ($query) {
    //             $query->where('jurusan_id', Auth::user()->pegawai->jurusan_id);
    //         })->get();
    //         return view('matakuliah.create', compact('data', 'jenis', 'rumpun', 'pegawai', 'program_studi', 'kurikulum'));
    //     } else {
    //         $pegawai = Pegawai::where('status', 'dosen')->get();
    //         $program_studi = Program_studi::get();
    //         $rumpun = Rumpun::get();
    //         $kurikulum = Kurikulum::get();
    //         if (Auth::user()->hasRole('operator') && Auth::user()->pegawai->status == 'dosen') {
    //             $data = Matakuliah::with('jenis', 'pegawai', 'rumpun', 'program_studi')->get();
    //             return view('matakuliah.create', compact('data', 'jenis', 'rumpun', 'pegawai', 'program_studi', 'kurikulum'));
    //         } else {
    //             return back();
    //         }
    //         // elseif (Auth::user()->hasRole('operator') && (Auth::user()->pegawai->status == 'dosen')) {
    //         //     $data = Matakuliah::with('jenis', 'pegawai', 'rumpun', 'program_studi')->where('pegawai_id', Auth::user()->pegawai->id)->get();
    //         //     return view('matakuliah.create', compact('data','jenis' ,'rumpun','pegawai','program_studi', 'kurikulum'));
    //         // }
    //     }
    // }


    public function store(Request $request)
    {
        // dd($request);
        // return $request->kurikulum;
        $data = $request->validate([
            'nama' => 'required',
            'kode' => 'required',
            'urutan' => 'required',
            'jenjang' => 'required',
            'semester' => 'required',
            'sks' => 'required', 
            'mk_persyaratan' => 'required',
            'pegawai_id' => 'required',
            'rumpun_id' => 'required',
            'jenis_id' => 'required',
            'program_studi_id' => 'required',
            'deskripsi' => 'required',
        ]);
        $data['kode'] = strtoupper($request->kode);
        $data['teori'] = $request->teori ?? 0;
        $data['praktek'] = $request->praktek ?? 0;
        $data['lapangan'] = $request->lapangan ?? 0;
        if ($request->sks != ($data['teori'] + $data['praktek'] + $data['lapangan'])) {
            if ($request->sks < ($data['teori'] + $data['praktek'] + $data['lapangan'])) {
                return 'melebihi';
            } else {
                return 'kurang';
            }
        } else {
            $mk = Matakuliah::create($data);
            $mk->kurikulum()->attach($request->kurikulum);
            $mk->pegawai_rps()->attach($request->pegawai_rps);
            return redirect('/matakuliah');
        }
    }

    public function update(Matakuliah $matakuliah,Request $request)
    {
        // dd($request);
        // return $request->kurikulum;
        $data = $request->validate([
            'nama' => 'required',
            'kode' => 'required',
            'urutan' => 'required',
            'jenjang' => 'required',
            'semester' => 'required',
            'sks' => 'required', 
            'mk_persyaratan' => 'required',
            'pegawai_id' => 'required',
            'rumpun_id' => 'required',
            'jenis_id' => 'required',
            'program_studi_id' => 'required',
            'deskripsi' => 'required',
        ]);
        $data['kode'] = strtoupper($request->kode);
        $data['teori'] = $request->teori ?? 0;
        $data['praktek'] = $request->praktek ?? 0;
        $data['lapangan'] = $request->lapangan ?? 0;
        if ($request->sks != ($data['teori'] + $data['praktek'] + $data['lapangan'])) {
            if ($request->sks < ($data['teori'] + $data['praktek'] + $data['lapangan'])) {
                return 'melebihi';
            } else {
                return 'kurang';
            }
        } else {
            $matakuliah->update($data);
            $matakuliah->matakuliah_kurikulum()->delete();
            $matakuliah->kurikulum()->attach($request->kurikulum);
            Matakuliah_pegawai::where('matakuliah_id', $matakuliah->id)->delete();
            $matakuliah->pegawai_rps()->attach($request->pegawai_rps);
            return back();
        }
    }

    public function cetak(Request $request)
    {
        // $kurikulum = Kurikulum::whereIn('id', $request->kurikulum)->get();
        if ($request->simpan == 'distribusi') {
            $kelompok = Rumpun::get();
            if ($request->kurikulum) {
                $kurikulum = Kurikulum::whereIn('id', $request->kurikulum)->get();
                $semester  = Matakuliah::join('matakuliah_kurikulum', 'matakuliah_kurikulum.matakuliah_id', '=', 'matakuliah.id')
                    ->join('program_studi', 'program_studi.id', '=', 'matakuliah.program_studi_id')
                    ->select('matakuliah.semester')
                    ->where('program_studi.jurusan_id', Auth::user()->pegawai->jurusan_id)
                    ->whereIn('matakuliah_kurikulum.kurikulum_id', $request->kurikulum)
                    ->groupBy('matakuliah.semester')
                    ->get();
                $data  = Matakuliah::join('matakuliah_kurikulum', 'matakuliah_kurikulum.matakuliah_id', '=', 'matakuliah.id')
                    ->join('program_studi', 'program_studi.id', '=', 'matakuliah.program_studi_id')
                    ->select('matakuliah.*')
                    ->where('program_studi.jurusan_id', Auth::user()->pegawai->jurusan_id)
                    ->whereIn('matakuliah_kurikulum.kurikulum_id', $request->kurikulum)->get();
            } else {
                $semester  = Matakuliah::join('program_studi', 'program_studi.id', '=', 'matakuliah.program_studi_id')
                    ->where('program_studi.jurusan_id', Auth::user()->pegawai->jurusan_id)
                    ->select('matakuliah.semester')
                    ->groupBy('matakuliah.semester')
                    ->get();
                $data  = Matakuliah::join('program_studi', 'program_studi.id', '=', 'matakuliah.program_studi_id')
                    ->select('matakuliah.*')
                    ->where('program_studi.jurusan_id', Auth::user()->pegawai->jurusan_id)
                    ->get();
                $kurikulum = Kurikulum::get();
            }
            return view('pdf.distribusi', compact('semester', 'data', 'kurikulum', 'kelompok'));
        } elseif ($request->simpan == 'matrik') {
            $kelompok = Rumpun::get();
            $profil_lulusan = Profil_lulusan::get();
            if ($request->kurikulum) {
                $kurikulum = Kurikulum::whereIn('id', $request->kurikulum)->get();
                $semester  = Matakuliah::join('matakuliah_kurikulum', 'matakuliah_kurikulum.matakuliah_id', '=', 'matakuliah.id')
                    ->join('program_studi', 'program_studi.id', '=', 'matakuliah.program_studi_id')
                    ->select('matakuliah.semester')
                    ->where('program_studi.jurusan_id', Auth::user()->pegawai->jurusan_id)
                    ->whereIn('matakuliah_kurikulum.kurikulum_id', $request->kurikulum)
                    ->groupBy('matakuliah.semester')
                    ->get();
                $data  = Matakuliah::join('matakuliah_kurikulum', 'matakuliah_kurikulum.matakuliah_id', '=', 'matakuliah.id')
                    ->join('program_studi', 'program_studi.id', '=', 'matakuliah.program_studi_id')
                    ->select('matakuliah.*')
                    ->where('program_studi.jurusan_id', Auth::user()->pegawai->jurusan_id)
                    ->whereIn('matakuliah_kurikulum.kurikulum_id', $request->kurikulum)->get();
            } else {
                $semester  = Matakuliah::join('program_studi', 'program_studi.id', '=', 'matakuliah.program_studi_id')
                    ->where('program_studi.jurusan_id', Auth::user()->pegawai->jurusan_id)
                    ->select('matakuliah.semester')
                    ->groupBy('matakuliah.semester')
                    ->get();
                $data  = Matakuliah::join('program_studi', 'program_studi.id', '=', 'matakuliah.program_studi_id')
                    ->select('matakuliah.*')
                    ->where('program_studi.jurusan_id', Auth::user()->pegawai->jurusan_id)
                    ->get();
                $kurikulum = Kurikulum::get();
            }
            return view('pdf.matrik', compact('semester', 'data', 'kurikulum', 'kelompok', 'profil_lulusan'));
        } else {
            // $kelompok = Rumpun::get();
            if ($request->kurikulum) {
                $kelompok = Rumpun::join('matakuliah', 'matakuliah.rumpun_id', '=', 'rumpun.id')
                    ->join('matakuliah_kurikulum', 'matakuliah_kurikulum.matakuliah_id', '=', 'matakuliah.id')
                    ->join('program_studi', 'program_studi.id', '=', 'matakuliah.program_studi_id')
                    ->select('rumpun.*')
                    ->where('program_studi.jurusan_id', Auth::user()->pegawai->jurusan_id)
                    ->whereIn('matakuliah_kurikulum.kurikulum_id', $request->kurikulum)
                    ->get();
                $kurikulum = Kurikulum::whereIn('id', $request->kurikulum)->get();
                $semester  = Matakuliah::join('matakuliah_kurikulum', 'matakuliah_kurikulum.matakuliah_id', '=', 'matakuliah.id')
                    ->join('program_studi', 'program_studi.id', '=', 'matakuliah.program_studi_id')
                    ->select('matakuliah.semester')
                    ->where('program_studi.jurusan_id', Auth::user()->pegawai->jurusan_id)
                    ->whereIn('matakuliah_kurikulum.kurikulum_id', $request->kurikulum)
                    ->groupBy('matakuliah.semester')
                    ->get();
                $data  = Matakuliah::join('matakuliah_kurikulum', 'matakuliah_kurikulum.matakuliah_id', '=', 'matakuliah.id')
                    ->join('program_studi', 'program_studi.id', '=', 'matakuliah.program_studi_id')
                    ->select('matakuliah.*')
                    ->where('program_studi.jurusan_id', Auth::user()->pegawai->jurusan_id)
                    ->whereIn('matakuliah_kurikulum.kurikulum_id', $request->kurikulum)->get();
                $nama_kelompok = Rumpun::get();
            } else {
                $semester  = Matakuliah::join('program_studi', 'program_studi.id', '=', 'matakuliah.program_studi_id')
                    ->where('program_studi.jurusan_id', Auth::user()->pegawai->jurusan_id)
                    ->select('matakuliah.semester')
                    ->groupBy('matakuliah.semester')
                    ->get();
                $kelompok = Rumpun::join('matakuliah', 'matakuliah.rumpun_id', '=', 'rumpun.id')
                    ->select('rumpun.id')
                    ->join('program_studi', 'program_studi.id', '=', 'matakuliah.program_studi_id')
                    ->where('program_studi.jurusan_id', Auth::user()->pegawai->jurusan_id)
                    ->groupBy('rumpun.id')
                    ->get();
                $nama_kelompok = Rumpun::get();
                $data  = Matakuliah::join('program_studi', 'program_studi.id', '=', 'matakuliah.program_studi_id')
                    ->select('matakuliah.*')
                    ->where('program_studi.jurusan_id', Auth::user()->pegawai->jurusan_id)
                    ->get();
                $kurikulum = Kurikulum::get();
            }
            return view('pdf.struktur', compact('semester', 'data', 'kurikulum', 'kelompok', 'nama_kelompok'));
        }
    }

    public function delete(Matakuliah $matakuliah)
    {
        $matakuliah->delete();
        return back();
    }

    public function show(Matakuliah $matakuliah)
    {
        $karakteristik = Karakteristik::with('jurusan')->where('jurusan_id', $matakuliah->program_studi->jurusan_id)->get();
        $bentuk = Bentuk::with('jurusan')->where('jurusan_id', $matakuliah->program_studi->jurusan_id)->get();
        $metode_pembelajaran = Metode_pembelajaran::with('jurusan')->where('jurusan_id', $matakuliah->program_studi->jurusan_id)->get();
        $pegawai = Pegawai::where('status', 'dosen')->get();
        $capaian_lulusan = Capaian_lulusan::where('jurusan_id', $matakuliah->program_studi->jurusan->id)->orderBy('profil_lulusan_id', 'asc')->get();
        return view('matakuliah.show', compact('matakuliah', 'capaian_lulusan', 'pegawai', 'karakteristik', 'bentuk', 'metode_pembelajaran'));
    }
}
