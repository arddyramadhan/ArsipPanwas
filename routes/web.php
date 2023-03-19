<?php

use App\Http\Controllers\BentukController;
use App\Http\Controllers\BerkasController;
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
use App\Http\Controllers\SuratKelaurController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
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
    Route::prefix('/pegawai')->group(function () {
        Route::get('', [PegawaiController::class, 'index']);
        Route::post('/store', [PegawaiController::class, 'store']);
        Route::post('/storeDosen', [PegawaiController::class, 'storeDosen']);
        Route::post('/user', [PegawaiController::class, 'user']);
        Route::patch('/{pegawai}/update', [PegawaiController::class, 'update']);
        Route::get('/{pegawai}/ubahRole', [PegawaiController::class, 'ubahRole']);
        Route::get('/{pegawai}/reset', [PegawaiController::class, 'resetPassword']);
        Route::delete('/{pegawai}/delete', [PegawaiController::class, 'delete']);
        Route::get('/{pegawai}/show', [PegawaiController::class, 'show']);
    });

    Route::prefix('/surat_masuk')->group(function () {
        Route::get('', [SuratMasukController::class, 'index']);
        Route::post('/store', [SuratMasukController::class, 'store']);
        Route::patch('/{surat_masuk}/update', [SuratMasukController::class, 'update']);
        Route::delete('/{surat_masuk}/delete', [SuratMasukController::class, 'delete']);
        Route::get('/{surat_masuk}', [SuratMasukController::class, 'show']);
    });

    Route::prefix('/surat_keluar')->group(function () {
        Route::get('', [SuratKeluarController::class, 'index']);
        Route::post('/store', [SuratKeluarController::class, 'store']);
        Route::patch('/{surat_keluar}/update', [SuratKeluarController::class, 'update']);
        Route::delete('/{surat_keluar}/delete', [SuratKeluarController::class, 'delete']);
        Route::get('/{surat_keluar}/print', [SuratKeluarController::class, 'print']);
        Route::get('/{surat_keluar}', [SuratKeluarController::class, 'show']);
    });

    Route::prefix('/jenis')->group(function () {
        Route::get('', [JenisController::class, 'index']);
        Route::post('/store', [JenisController::class, 'store']);
        Route::patch('/{jenis}/update', [JenisController::class, 'update']);
        Route::delete('/{jenis}/delete', [JenisController::class, 'delete']);
    });

    Route::prefix('/berkas')->group(function () {
        Route::get('', [BerkasController::class, 'index']);
        Route::get('/{jenis_id}/index', [BerkasController::class, 'Byjenis']);
        Route::post('/store', [BerkasController::class, 'store']);
        Route::patch('/{berkas}/update', [BerkasController::class, 'update']);
        Route::delete('/{berkas}/delete', [BerkasController::class, 'delete']);
    });
});