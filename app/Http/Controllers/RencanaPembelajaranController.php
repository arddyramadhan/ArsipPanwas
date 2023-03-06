<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Rencana_pembelajaran;
use Illuminate\Http\Request;

class RencanaPembelajaranController extends Controller
{
    public function store(Request $request, Matakuliah $matakuliah)
    {
        // return $request->karakteristik;
        $data = $request->validate([
            'tahap_belajar' => 'required',
            // 'indikator' => 'required',
            'kriteria' => 'required',
            'bentuk' => 'required',
            'materi' => 'required',
            'bobot' => 'required',
            'penugasan_luring' => 'required',
        ]);
        $data['indikator'] = $request->indikator;
        $data['penugasan_daring'] = $request->penugasan_daring ?? $request->penugasan_luring ;
        $data['matakuliah_id'] = $matakuliah->id;
        $data['urutan'] = $matakuliah->rencana_pembelajaran->count() + 1;
        // dd($data);
        $rencana = Rencana_pembelajaran::create($data);

        // !karakteristik luring
        if ($rencana->rps_karakteristik_pembelajaran->count() > 0) {
            $rencana->rps_karakteristik_pembelajaran()->delete();
            $rencana->karakteristik_pembelajaran()->attach($request->karakteristik);
        } else {
            $rencana->karakteristik_pembelajaran()->attach($request->karakteristik);
        }
        // !karakteristik daring
        if ($rencana->rps_karakteristik_pembelajaran_daring->count() > 0) {
            $rencana->rps_karakteristik_pembelajaran_daring()->delete();
            $rencana->karakteristik_pembelajaran_daring()->attach($request->karakteristik_daring);
        } else {
            $rencana->karakteristik_pembelajaran_daring()->attach($request->karakteristik_daring);
        }
        
        // !bentuk pembelajaran luring
        if ($rencana->rps_bentuk_pembelajaran->count() > 0) {
            $rencana->rps_bentuk_pembelajaran()->delete();
            $rencana->bentuk_pembelajaran()->attach($request->bentuk_pembelajaran);
        } else {
            $rencana->bentuk_pembelajaran()->attach($request->bentuk_pembelajaran);
        }
        
        // !bentuk pembelajaran daring
        if ($rencana->rps_bentuk_pembelajaran_daring->count() > 0) {
            $rencana->rps_bentuk_pembelajaran_daring()->delete();
            $rencana->bentuk_pembelajaran_daring()->attach($request->bentuk_pembelajaran_daring);
        } else {
            $rencana->bentuk_pembelajaran_daring()->attach($request->bentuk_pembelajaran_daring);
        }
        
        if ($rencana->rps_metode->count() > 0) {
            $rencana->rps_metode()->delete();
            $rencana->metode_pembelajaran()->attach($request->metode_pembelajaran);
        } else {
            $rencana->metode_pembelajaran()->attach($request->metode_pembelajaran);
        }

        if ($rencana->rps_metode_daring->count() > 0) {
            $rencana->rps_metode_daring()->delete();
            $rencana->metode_pembelajaran_daring()->attach($request->metode_pembelajaran_daring);
        } else {
            $rencana->metode_pembelajaran_daring()->attach($request->metode_pembelajaran_daring);
        }
        
        if ($rencana->urutan == 7) {
            $uts =[
                'tahap_belajar' => 'uts',
                // 'indikator' => ,
                'kriteria' => 'uts',
                'bentuk' => 'uts',
                'materi' => 'uts',
                'bobot' => 0,
                'penugasan_luring' => 'uts',
            ];
            $uts['indikator'] = 'uts';
            $uts['penugasan_daring'] = 'uts';
            $uts['matakuliah_id'] = $matakuliah->id;
            $uts['urutan'] = $matakuliah->rencana_pembelajaran->count() + 1;
            Rencana_pembelajaran::create($uts);
        }
        if ($rencana->urutan == 15) {
            $uas =[
                'tahap_belajar' => 'uas',
                // 'indikator' => ,
                'kriteria' => 'uas',
                'bentuk' => 'uas',
                'materi' => 'uas',
                'bobot' => 0,
                'penugasan_luring' => 'uas',
            ];
            $uas['indikator'] = 'uas';
            $uas['penugasan_daring'] = 'uas';
            $uas['matakuliah_id'] = $matakuliah->id;
            $uas['urutan'] = $matakuliah->rencana_pembelajaran->count() + 1;
            Rencana_pembelajaran::create($uas);
        }
        // return $rencana->rps_metode->count() > 0;
        return back();
    }
}
