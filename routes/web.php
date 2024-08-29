<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\superAdminDashboard;
use App\Http\Controllers\superAdminLaporanKehadiran;
use App\Http\Controllers\superAdminPresensi;
use App\Http\Controllers\superAdminDataKaryawan;
use App\Http\Controllers\loginController;
Route::get('/', function () {
    return view('welcome');
});

// Route::middleware('auth')->group(function () {
    Route::get('/SuperAdmin-dashboard', [superAdminDashboard::class, 'index'])->name('dashboard.index');
    Route::get('/SuperAdmin-LaporanKehadiran', [superAdminLaporanKehadiran::class, 'index'])->name('lapor.index');
    Route::get('/SuperAdmin-LaporanKehadiran-terlambat', [superAdminLaporanKehadiran::class, 'terlambat'])->name('lapor.terlambat');
    Route::get('/SuperAdmin-LaporanKehadiran-lembur', [superAdminLaporanKehadiran::class, 'lembur'])->name('lapor.lembur');
    Route::get('/SuperAdmin-Presensi', [superAdminPresensi::class, 'index'])->name('presensi.index');
    Route::get('/SuperAdmin-DataKaryawan', [superAdminDataKaryawan::class, 'index'])->name('Data_karyawan.index');


    Route::get('/SuperAdmin-LaporanKehadiran-dataKehadiran', [superAdminLaporanKehadiran::class, 'getDummyKehadiran'])->name('Data_kehadiran.getDummy');
    Route::get('/SuperAdmin-LaporanKehadiran-dataKehadiran-terlambat', [superAdminLaporanKehadiran::class, 'getDummyTerlambat'])->name('Data_kehadiran.getTerlambat');
    Route::get('/SuperAdmin-LaporanKehadiran-dataKehadiran-lembur', [superAdminLaporanKehadiran::class, 'getDummyLembur'])->name('Data_kehadiran.getLembur');
    Route::get('/SuperAdmin-DataKaryawan-dataKaryawan', [superAdminDataKaryawan::class, 'getDummyDataKaryawan'])->name('Data_karyawan.getDummy');

// });

Route::get('/login', [loginController::class, 'index']);
Route::post('/login', [loginController::class, 'authenticate']);


Route::get('/template_karyawan', function () {
    return view('template_karyawan');
});
// Route::get('/login', function () {
//     return view('auth/login');
// });
Route::get('/template_admin', function () {
    return view('template_admin');
});
// Route::get('/hrd', function () {
//     return view('super_admin.dashboard.index');
// });
// Route::get('/presensi_hrd', function () {
//     return view('super_admin.presensi.index');
// });
// Route::get('/laporan_hrd', function () {
//     return view('super_admin.laporan_kehadiran.index');
// });
// Route::get('/datakaryawan', function () {
//     return view('super_admin.data_karyawan.index');
// });
Route::get('/karyawan', function () {
    return view('karyawan.dashboard.index');
});
Route::get('/presensi_karyawan', function () {
    return view('karyawan.presensi.index');
});
Route::get('/laporan_karyawan', function () {
    return view('karyawan.laporan.index');
});

// require __DIR__ . '/auth.php';

