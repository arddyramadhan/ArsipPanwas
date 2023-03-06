<?php

use App\Http\Controllers\BentukController;
use App\Http\Controllers\CapaianLulusanController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CpmkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KarakteristikController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\LuringController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\MetodePembelajaranController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PegawaiFakultasController;
use App\Http\Controllers\PegawaiJurusanController;
use App\Http\Controllers\ProfilJurusanController;
use App\Http\Controllers\ProfilLulusanController;
use App\Http\Controllers\ProfilProdiController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\RencanaPembelajaranController;
use App\Http\Controllers\RpsController;
use App\Http\Controllers\RumpunController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('art/{perintah}', function ($perintah) {
    Artisan::call($perintah);
    session()->flash('session', 'Artisan');
    return redirect('/');
});

Route::get('/', function () {
    return redirect('/login');
})->name('home');

// Route::get('/roles', function () {
//     return view('landing');
// })->name('home');
Route::get('/test', [Controller::class, 'test']);
Route::get('/cek', [Controller::class, 'CekLogin']);

Route::middleware('auth')->group(function () {
    Route::prefix('/dashboard')->group(function () {
        Route::get('', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/sinkron', [DashboardController::class, 'sinkron']);
        Route::post('/cekSinkron', [DashboardController::class, 'cekSinkron']);
        Route::post('/sinkron', [DashboardController::class, 'sinkron_sekarang']);
    });
    Route::prefix('/fakultas')->group(function () {
        Route::get('', [FakultasController::class, 'index']);
        Route::post('/store', [FakultasController::class, 'store']);
        Route::patch('/{fakultas}/update', [FakultasController::class, 'update']);
        Route::delete('/{fakultas}/delete', [FakultasController::class, 'delete']);
        Route::get('/{fakultas}/show', [FakultasController::class, 'show']);
    });
    Route::prefix('/jurusan')->group(function () {
        Route::get('', [JurusanController::class, 'index']);
        Route::post('/store', [JurusanController::class, 'store']);
        Route::patch('/{jurusan}/update', [JurusanController::class, 'update']);
        Route::delete('/{jurusan}/delete', [JurusanController::class, 'delete']);
        Route::get('/{jurusan}/show', [JurusanController::class, 'show']);
    });
    Route::prefix('/program_studi')->group(function () {
        Route::get('', [ProgramStudiController::class, 'index']);
        Route::post('/store', [ProgramStudiController::class, 'store']);
        Route::patch('/{program_studi}/update', [ProgramStudiController::class, 'update']);
        Route::get('/{program_studi}/cetak', [ProgramStudiController::class, 'cetak']);
        Route::delete('/{program_studi}/delete', [ProgramStudiController::class, 'delete']);
        Route::get('/{program_studi}/show', [ProgramStudiController::class, 'show']);
    });
    Route::prefix('/rumpun')->group(function () {
        Route::get('', [RumpunController::class, 'index']);
        Route::post('/store', [RumpunController::class, 'store']);
        Route::patch('/{rumpun}/update', [RumpunController::class, 'update']);
        Route::delete('/{rumpun}/delete', [RumpunController::class, 'delete']);
        Route::get('/{rumpun}/show', [RumpunController::class, 'show']);
    });
    Route::prefix('/kurikulum')->group(function () {
        Route::get('', [KurikulumController::class, 'index']);
        Route::post('/store', [KurikulumController::class, 'store']);
        Route::patch('/{kurikulum}/update', [KurikulumController::class, 'update']);
        Route::delete('/{kurikulum}/delete', [KurikulumController::class, 'delete']);
        Route::get('/{kurikulum}/show', [KurikulumController::class, 'show']);
    });
    Route::prefix('/jenis')->group(function () {
        Route::get('', [JenisController::class, 'index']);
        Route::post('/store', [JenisController::class, 'store']);
        Route::patch('/{jenis}/update', [JenisController::class, 'update']);
        Route::delete('/{jenis}/delete', [JenisController::class, 'delete']);
        Route::get('/{jenis}/show', [JenisController::class, 'show']);
    });
    Route::prefix('/pegawai')->group(function () {
        Route::get('', [PegawaiController::class, 'index']);
        Route::post('/store', [PegawaiController::class, 'store']);
        Route::post('/storeDosen', [PegawaiController::class, 'storeDosen']);
        Route::post('/storeOperator', [PegawaiController::class, 'storeOperator']);
        Route::patch('/{pegawai}/update', [PegawaiController::class, 'update']);
        Route::get('/{pegawai}/ubahRole', [PegawaiController::class, 'ubahRole']);
        Route::get('/{pegawai}/reset', [PegawaiController::class, 'resetPassword']);
        Route::delete('/{pegawai}/delete', [PegawaiController::class, 'delete']);
        Route::get('/{pegawai}/show', [PegawaiController::class, 'show']);
    });
    Route::prefix('/matakuliah')->group(function () {
        Route::get('', [MatakuliahController::class, 'index']);
        Route::post('/store', [MatakuliahController::class, 'store']);
        Route::get('/cetak', [MatakuliahController::class, 'cetak']);
        Route::get('/create', [MatakuliahController::class, 'create']);
        Route::patch('/{matakuliah}/update', [MatakuliahController::class, 'update']);
        Route::delete('/{matakuliah}/delete', [MatakuliahController::class, 'delete']);
        Route::get('/{matakuliah}/show', [MatakuliahController::class, 'show']);
        Route::get('/{matakuliah}/edit', [MatakuliahController::class, 'edit']);
    });
    Route::prefix('/capaian_lulusan')->group(function () {
        Route::get('', [CapaianLulusanController::class, 'index']);
        Route::post('/store', [CapaianLulusanController::class, 'store']);
        Route::get('/create', [CapaianLulusanController::class, 'create']);
        Route::patch('/{capaian_lulusan}/update', [CapaianLulusanController::class, 'update']);
        Route::delete('/{capaian_lulusan}/delete', [CapaianLulusanController::class, 'delete']);
        Route::get('/{capaian_lulusan}/show', [CapaianLulusanController::class, 'show']);
    });
    Route::prefix('/mk_capaian_lulusan')->group(function () {
        Route::get('', [CapaianLulusanController::class, 'index']);
        Route::post('/store', [CapaianLulusanController::class, 'store']);
        Route::get('/create', [CapaianLulusanController::class, 'create']);
        Route::patch('/{mk_capaian_lulusan}/update', [CapaianLulusanController::class, 'update']);
        Route::delete('/{mk_capaian_lulusan}/delete', [CapaianLulusanController::class, 'delete']);
        Route::get('/{mk_capaian_lulusan}/show', [CapaianLulusanController::class, 'show']);
    });
    Route::prefix('/profil_lulusan')->group(function () {
        Route::get('', [ProfilLulusanController::class, 'index']);
        Route::post('/store', [ProfilLulusanController::class, 'store']);
        Route::get('/create', [ProfilLulusanController::class, 'create']);
        Route::patch('/{profil_lulusan}/update', [ProfilLulusanController::class, 'update']);
        Route::delete('/{profil_lulusan}/delete', [ProfilLulusanController::class, 'delete']);
        Route::get('/{profil_lulusan}/show', [ProfilLulusanController::class, 'show']);
    });
    Route::prefix('/rps')->group(function () {
        Route::get('', [RpsController::class, 'index']);
        Route::get('/{matakuliah}/rps_pdf', [RpsController::class, 'rps_pdf']);
        Route::patch('/{matakuliah}/cpl', [RpsController::class, 'cpl']);
        Route::patch('/{matakuliah}/cpmk', [RpsController::class, 'cpmk']);
        Route::patch('/{cpmk}/cpmk_update', [RpsController::class, 'cpmk_update']);
        Route::patch('/{matakuliah}/lainnya', [RpsController::class, 'lainnya']);
        Route::delete('/{cpmk}/cpmk_delete', [ProfilLulusanController::class, 'cpmk_delete']);
        Route::get('/{matakuliah}/show/{halaman}', [RpsController::class, 'show']);
        Route::get('/{matakuliah}/show_scroll/{halaman}/{scroll}', [RpsController::class, 'show_scroll']);
    });
    Route::prefix('/cpmk')->group(function () {
        Route::get('', [CpmkController::class, 'index']);
    });
    Route::prefix('/karakteristik')->group(function () {
        Route::post('/store', [KarakteristikController::class, 'store']);
        Route::patch('/{karakteristik}/update', [KarakteristikController::class, 'update']);
        Route::delete('/{karakteristik}/delete', [KarakteristikController::class, 'delete']);
    });
    Route::prefix('/bentuk')->group(function () {
        Route::post('/store', [BentukController::class, 'store']);
        Route::patch('/{bentuk}/update', [BentukController::class, 'update']);
        Route::delete('/{bentuk}/delete', [BentukController::class, 'delete']);
    });
    Route::prefix('/metode_pembelajaran')->group(function () {
        Route::post('/store', [MetodePembelajaranController::class, 'store']);
        Route::patch('/{metode_pembelajaran}/update', [MetodePembelajaranController::class, 'update']);
        Route::delete('/{metode_pembelajaran}/delete', [MetodePembelajaranController::class, 'delete']);
    });
    Route::prefix('/rencana_pembelajaran')->group(function () {
        Route::post('/{matakuliah}/store', [RencanaPembelajaranController::class, 'store']);
        Route::patch('/{rencana_pembelajaran}/update', [RencanaPembelajaranController::class, 'update']);
        Route::delete('/{rencana_pembelajaran}/delete', [RencanaPembelajaranController::class, 'delete']);
    });
    Route::prefix('/pegawai_fakultas')->group(function () {
        Route::get('', [PegawaiFakultasController::class, 'index']);
        Route::post('/store', [PegawaiFakultasController::class, 'store']);
        Route::patch('/{pegawai_fakultas}/update', [PegawaiFakultasController::class, 'update']);
        Route::patch('/{pegawai_fakultas}/set', [PegawaiFakultasController::class, 'set']);
        Route::delete('/{pegawai_fakultas}/delete', [PegawaiFakultasController::class, 'delete']);
    });
    Route::prefix('/pegawai_jurusan')->group(function () {
        Route::get('', [PegawaiJurusanController::class, 'index']);
        // !jurusan
        Route::prefix('/jurusan')->group(function () {
            Route::post('/store', [PegawaiJurusanController::class, 'storejurusan']);
            Route::patch('/{pegawai_jurusan}/update', [PegawaiJurusanController::class, 'updatejurusan']);
            Route::patch('/{pegawai_jurusan}/set', [PegawaiJurusanController::class, 'setjurusan']);
            Route::delete('/{pegawai_jurusan}/delete', [PegawaiJurusanController::class, 'deletejurusan']);
        });
        // !prodi
        Route::prefix('/prodi')->group(function () {
            Route::post('/store', [PegawaiJurusanController::class, 'storeprodi']);
            Route::patch('/{pegawai_prodi}/update', [PegawaiJurusanController::class, 'updateprodi']);
            Route::patch('/{pegawai_prodi}/set', [PegawaiJurusanController::class, 'setprodi']);
            Route::delete('/{pegawai_prodi}/delete', [PegawaiJurusanController::class, 'deleteprodi']);
        });
    });
    Route::prefix('/profil_jurusan')->group(function () {
        Route::get('', [ProfilJurusanController::class, 'index']);
        Route::post('/store', [ProfilJurusanController::class, 'store']);
        Route::get('/cetak', [ProfilJurusanController::class, 'cetak']);
        Route::patch('/{profil_jurusan}/update', [ProfilJurusanController::class, 'update']);
        Route::delete('/{profil_jurusan}/delete', [ProfilJurusanController::class, 'delete']);
    });
    Route::prefix('/profil_prodi')->group(function () {
        Route::get('', [ProfilProdiController::class, 'index']);
        Route::post('/store', [ProfilProdiController::class, 'store']);
        Route::get('/cetak', [ProfilProdiController::class, 'cetak']);
        Route::patch('/{profil_prodi}/update', [ProfilProdiController::class, 'update']);
        Route::delete('/{profil_prodi}/delete', [ProfilProdiController::class, 'delete']);
    });
});