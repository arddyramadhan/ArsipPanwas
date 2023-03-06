<?php

namespace App\Http\Controllers;

use App\Models\Bentuk;
use App\Models\Capaian_lulusan;
use App\Models\Cpmk;
use App\Models\Karakteristik;
use App\Models\Kurikulum;
use App\Models\Matakuliah;
use App\Models\Metode_pembelajaran;
use App\Models\Pegawai;
use App\Models\Profil_lulusan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RpsController extends Controller
{

    private function isMobile(){
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }

    public function rps_pdf(Matakuliah $matakuliah)
    {
        // if ($this->isMobile()) {
        //     return "pakai hp";
        // }else{
        //     return "pakai laptop";
        // }
        $profil_lulusan  = Profil_lulusan::orderBy('urutan', 'asc')->get();
        $capaian_lulusan = Capaian_lulusan::where('jurusan_id', $matakuliah->program_studi->jurusan->id)->orderBy('profil_lulusan_id', 'asc')
        ->get();
        return view('pdf.rps', compact('matakuliah', 'capaian_lulusan', 'profil_lulusan'));
    }
    public function index()
    {
        $data = Matakuliah::with('jenis', 'pegawai', 'rumpun', 'pegawai_rps')
        ->join('matakuliah_pegawai', 'matakuliah_pegawai.matakuliah_id', '=', 'matakuliah.id')
        ->select('matakuliah.*')
        ->where('matakuliah.pegawai_id', Auth::user()->pegawai->id)
        ->orWhere('matakuliah_pegawai.pegawai_id', Auth::user()->pegawai->id)
        // ->with('pegawai_rps', function ($query) {
        //     $query->where('pegawai_id', Auth::user()->pegawai->id);
        // })
        ->orderBy('matakuliah.created_at', 'desc')
        ->groupBy('matakuliah.id')
        ->get();
        return view('rps.index', compact('data'));
    }
    public function show(Matakuliah $matakuliah, $halaman)
    {
        $karakteristik = Karakteristik::with('jurusan')->where('jurusan_id', $matakuliah->program_studi->jurusan_id)->get();
        $bentuk = Bentuk::with('jurusan')->where('jurusan_id', $matakuliah->program_studi->jurusan_id)->get();
        $metode_pembelajaran = Metode_pembelajaran::with('jurusan')->where('jurusan_id', $matakuliah->program_studi->jurusan_id)->get();
        $pegawai = Pegawai::where('status', 'dosen')->get();
        $capaian_lulusan = Capaian_lulusan::where('jurusan_id', $matakuliah->program_studi->jurusan->id)->orderBy('profil_lulusan_id', 'asc')->get();
        return view('rps.show', compact('halaman','matakuliah', 'capaian_lulusan', 'pegawai','karakteristik', 'bentuk', 'metode_pembelajaran'));
    }

    public function show_scroll(Matakuliah $matakuliah, $halaman, $scroll)
    {
        $karakteristik = Karakteristik::with('jurusan')->where('jurusan_id', $matakuliah->program_studi->jurusan_id)->get();
        $bentuk = Bentuk::with('jurusan')->where('jurusan_id', $matakuliah->program_studi->jurusan_id)->get();
        $metode_pembelajaran = Metode_pembelajaran::with('jurusan')->where('jurusan_id', $matakuliah->program_studi->jurusan_id)->get();
        $pegawai = Pegawai::where('status', 'dosen')->get();
        $capaian_lulusan = Capaian_lulusan::where('jurusan_id', $matakuliah->program_studi->jurusan->id)->orderBy('profil_lulusan_id', 'asc')->get();
        return view('rps.show', compact('halaman','matakuliah', 'capaian_lulusan', 'pegawai','karakteristik', 'bentuk', 'metode_pembelajaran'));
    }

    public function cpl(Request $request, Matakuliah $matakuliah)
    {
        if ($matakuliah->cpl->count() > 0) {
            $matakuliah->cpl()->delete();
            $matakuliah->capaian_lulusan()->attach($request->capaian_lulusan);
        }else{
            $matakuliah->capaian_lulusan()->attach($request->capaian_lulusan);
        }
        return back();
    }

    public function cpmk(Request $request, Matakuliah $matakuliah)
    {
        $data = $request->validate([
            'sub_deskripsi' => 'required',
            'deskripsi' => 'required',
        ]);
        $data['matakuliah_id']= $matakuliah->id;
        $data['urutan'] = $matakuliah->cpmk->count() + 1;
        Cpmk::create($data);
        return redirect('/rps/'.$matakuliah->id. '/show_scroll/capaian/cpmk');
        // return back();
    }

    public function cpmk_delete(Cpmk $cpmk)
    {
        $cek = Cpmk::where('matakuliah_id',  $cpmk->matakuliah->id);
        $cpmk->delete();
        if ($cek->count() > 0) {
            foreach ($cek->orderBy('urutan', 'ASC')->get() as $no => $item) {
                $item->update(['urutan' => ++$no]);
            }
        }
        // return back();
        return redirect('/rps/' . $cpmk->matakuliah_id . '/show_scroll/capaian/cpmk');
    }

    public function cpmk_update(Request $request, Cpmk $cpmk)
    {
        if ($cpmk->urutan != $request->urutan) {
            $sebelum = Cpmk::where('urutan', $request->urutan)->where('matakuliah_id', $cpmk->matakuliah_id);
            if ($sebelum->count() > 0) {
                $sebelum->first()->update([
                    'urutan' => $cpmk->urutan
                ]);
                $cpmk->update([
                    'deskripsi' => $request->deskripsi,
                    'urutan' => $request->urutan,
                    'sub_deskripsi' => $request->sub_deskripsi,
                ]);
            } else {
                session()->flash('session', 'Urutan tidak valid');
            }
        } else {
            $cpmk->update([
                'deskripsi' => $request->deskripsi,
                'sub_deskripsi' => $request->sub_deskripsi,
                'urutan' => $request->urutan,
            ]);
        }
        // return back();
        return redirect('/rps/' . $cpmk->matakuliah_id . '/show_scroll/capaian/cpmk');
    }

    public function lainnya(Request $request, Matakuliah $matakuliah)
    {
        // return $request->pengampu;
        // $matakuliah->pengampu()->delete();
        $matakuliah->pegawai_pengampu()->attach($request->pengampu);
        $matakuliah->update([
            'deskripsi' => $request->deskripsi,
            'kajian' => $request->kajian,
            'pustaka_utama' => $request->pustaka_utama,
            'pustaka_pendukung' => $request->pustaka_pendukung,
            'mk_persyaratan' => $request->mk_persyaratan,
        ]);
        return redirect('/rps/' . $matakuliah->id . '/show_scroll/capaian/lainnya');
    }

    
}
