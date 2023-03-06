<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function update(Request $request, Fakultas $fakultas)
    {
        $fakultas->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'logo' => $request->logo,
        ]);
        return back();
    }

    public function show(Fakultas $fakultas)
    {
        return view('fakultas.show', compact('fakultas'));
    }
}
