<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\superAdminDashboard;
use App\Http\Controllers\superAdminLaporanKehadiran;
use App\Http\Controllers\superAdminPresensi;
use App\Http\Controllers\superAdminDataKaryawan;
use App\Http\Controllers\superAdminUserController;

use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\AdminLaporanKehadiran;
use App\Http\Controllers\AdminPresensi;
use App\Http\Controllers\AdminDataKaryawan;

use App\Http\Controllers\KaryawanDashboard;
use App\Http\Controllers\KaryawanLaporanKehadiran;
use App\Http\Controllers\KaryawanPresensi;
use App\Http\Controllers\KaryawanDataKaryawan;

use App\Http\Controllers\loginController;
Route::get('/', function () {
   

    return view('welcome');
});

// super admin
Route::group(['middleware' => ['auth']], function () {
    Route::get('/SuperAdmin-dashboard', [superAdminDashboard::class, 'index'])->name('SA-dashboard');
        Route::get('/SuperAdmin-LaporanKehadiran', [superAdminLaporanKehadiran::class, 'index'])->name('SA.lapor.index');
        Route::get('/SuperAdmin-LaporanKehadiran-terlambat', [superAdminLaporanKehadiran::class, 'terlambat'])->name('lapor.terlambat');
        Route::get('/SuperAdmin-LaporanKehadiran-lembur', [superAdminLaporanKehadiran::class, 'lembur'])->name('lapor.lembur');
        Route::get('/SuperAdmin-LaporanKehadiran-dataKehadiran', [superAdminLaporanKehadiran::class, 'getData'])->name('Super.Data_kehadiran.getData');
        Route::post('/SuperAdmin-LaporanKehadiran-dataKehadiran-store', [superAdminLaporanKehadiran::class, 'store'])->name('Super.Data_kehadiran.tambah');
        Route::get('/SuperAdmin-LaporanKehadiran/{id}/edit', [superAdminLaporanKehadiran::class, 'edit'])->name('Super.Data_kehadiran.edit');
        Route::put('/SuperAdmin-LaporanKehadiran/{id}/update', [superAdminLaporanKehadiran::class, 'update'])->name('SA.Data_kehadiran.update');
        Route::delete('/SuperAdmin-LaporanKehadiran-dataKehadiran/{id}/destroy', [superAdminLaporanKehadiran::class, 'destroy'])->name('SA.Data_kehadiran.destroy');
        Route::get('/SuperAdmin-LaporanKehadiran-dataKehadiran-terlambat', [superAdminLaporanKehadiran::class, 'getDummyTerlambat'])->name('Super.Data_kehadiran.getTerlambat');
        Route::get('/SuperAdmin-LaporanKehadiran-dataKehadiran-lembur', [superAdminLaporanKehadiran::class, 'getDummyLembur'])->name('Super.Data_kehadiran.getLembur');
    
        Route::get('/SuperAdmin-Presensi', [superAdminPresensi::class, 'index'])->name('SA.presensi.index');
        Route::post('/SuperAdmin-Presensi/masuk', [superAdminPresensi::class, 'presensiMasuk'])->name('SA.presensi.masuk');
        Route::post('/SuperAdmin-Presensi/keluar', [superAdminPresensi::class, 'presensiKeluar'])->name('SA.presensi.keluar');
        Route::post('/SuperAdmin-Presensi/izin', [superAdminPresensi::class, 'izinAbsen'])->name('SA.presensi.izin');

    
        Route::get('/SuperAdmin-DataKaryawan', [superAdminDataKaryawan::class, 'index'])->name('SA.Data_karyawan.index');
        Route::get('/SuperAdmin-DataKaryawan/{id}/edit', [superAdminDataKaryawan::class, 'edit'])->name('SA.Data_karyawan.edit');
        Route::put('/SuperAdmin-DataKaryawan/{id}/update', [superAdminDataKaryawan::class, 'update'])->name('SA.Data_karyawan.update');
        Route::delete('/SuperAdmin-DataKaryawan/{id}/destroy', [superAdminDataKaryawan::class, 'destroy'])->name('SA.Data_karyawan.destroy');
        Route::get('/SuperAdmin-DataKaryawan-dataKaryawan', [superAdminDataKaryawan::class, 'getData'])->name('Super.Data_karyawan.getData');
        Route::post('/SuperAdmin-DataKaryawan-dataKaryawan-store', [superAdminDataKaryawan::class, 'store'])->name('Super.Data_karyawan.tambah');
    
        Route::get('/SuperAdmin-DataUser', [superAdminUserController::class, 'index'])->name('SA.Data_User.index');
        Route::post('/SuperAdmin-DataUser-store', [superAdminUserController::class, 'store'])->name('SA.Data_User.tambah');
        Route::get('/SuperAdmin-DataUser-getData', [superAdminUserController::class, 'getData'])->name('SA.Data_User.getData');
        Route::get('/SuperAdmin-DataUser/{id}/edit', [superAdminUserController::class, 'edit'])->name('SA.Data_User.edit');
        Route::put('/SuperAdmin-DataUser/{id}/update', [superAdminUserController::class, 'update'])->name('SA.Data_User.update');
        Route::delete('/SuperAdmin-DataUser/{id}/destroy', [superAdminUserController::class, 'destroy'])->name('SA.Data_User.destroy');

        // admin
        Route::get('/Admin-dashboard', [AdminDashboard::class, 'index'])->name('Admin-dashboard');
        Route::get('/Admin-LaporanKehadiran', [AdminLaporanKehadiran::class, 'index'])->name('A.lapor.index');
        Route::get('/Admin-LaporanKehadiran-terlambat', [AdminLaporanKehadiran::class, 'terlambat'])->name('A.lapor.terlambat');
        Route::get('/Admin-LaporanKehadiran-lembur', [AdminLaporanKehadiran::class, 'lembur'])->name('A.lapor.lembur');

        Route::get('/Admin-Presensi', [AdminPresensi::class, 'index'])->name('presensi.index');
        Route::post('/Admin-Presensi/masuk', [AdminPresensi::class, 'presensiMasuk'])->name('A.presensi.masuk');
        Route::post('/Admin-Presensi/keluar', [AdminPresensi::class, 'presensikeluar'])->name('A.presensi.keluar');
        Route::post('/Admin-Presensi/izin', [AdminPresensi::class, 'izinAbsen'])->name('A.presensi.izin');


        Route::get('/Admin-DataKaryawan', [AdminDataKaryawan::class, 'index'])->name('A.Data_karyawan.index');
        Route::get('/Admin-DataKaryawan-getData', [AdminDataKaryawan::class, 'getData'])->name('A.Data_karyawan.getData');
        Route::get('/Admin-DataKaryawan/{id}/edit', [AdminDataKaryawan::class, 'edit'])->name('Admin.Data_karyawan.edit');

        Route::get('/Admin-LaporanKehadiran-getData', [AdminLaporanKehadiran::class, 'getKehadiran'])->name('A.Data_kehadiran.getData');
        Route::get('/Admin-LaporanKehadiran-getTerlambat', [AdminLaporanKehadiran::class, 'getTerlambat'])->name('A.Data_kehadiran.getTerlambat');
        Route::get('/Admin-LaporanKehadiran-getLembur', [AdminLaporanKehadiran::class, 'getLembur'])->name('A.Data_kehadiran.getLembur');
        
        Route::get('/Karyawan-dashboard', [KaryawanDashboard::class, 'index'])->name('Karyawan-dashboard');
        Route::get('/Karyawan-LaporanKehadiran', [KaryawanLaporanKehadiran::class, 'index'])->name('lapor.index');
        Route::get('/Karyawan-LaporanKehadiran-terlambat', [KaryawanLaporanKehadiran::class, 'terlambat'])->name('lapor.terlambat');
        Route::get('/Karyawan-LaporanKehadiran-lembur', [KaryawanLaporanKehadiran::class, 'lembur'])->name('lapor.lembur');
        Route::get('/Karyawan-DataKaryawan', [KaryawanDataKaryawan::class, 'index'])->name('Data_karyawan.index');
        Route::get('/Karyawan-DataKaryawan/{id}/edit', [KaryawanDataKaryawan::class, 'edit'])->name('Data_karyawan.edit');
    
        Route::get('/Karyawan-LaporanKehadiran-dataKehadiran', [KaryawanLaporanKehadiran::class, 'getKehadiran'])->name('Data_kehadiran.getKehadiran');
        Route::get('/Karyawan-LaporanKehadiran-getTerlambat', [KaryawanLaporanKehadiran::class, 'getTerlambat'])->name('Data_kehadiran.getTerlambat');
        Route::get('/Karyawan-LaporanKehadiran-getLembur', [KaryawanLaporanKehadiran::class, 'getLembur'])->name('Data_kehadiran.getLembur');

        Route::get('/Karyawan-Presensi', [KaryawanPresensi::class, 'index'])->name('K.presensi.index');
        Route::post('/Karyawan-Presensi/masuk', [KaryawanPresensi::class, 'presensiMasuk'])->name('K.presensi.masuk');
        Route::post('/Karyawan-Presensi/keluar', [KaryawanPresensi::class, 'presensiKeluar'])->name('K.presensi.keluar');
        Route::post('/Karyawan-Presensi/izin', [KaryawanPresensi::class, 'izinAbsen'])->name('K.presensi.izin');

        // Route::get('/Karyawan-DataKaryawan-dataKaryawan', [KaryawanDataKaryawan::class, 'getDummyDataKaryawanJson'])->name('Data_karyawan.getDummy');
    


});

// Route::group(['middleware' => ['auth', 'role:super_admin']], function () {
//     // dd('sampau');
//     

// });
    
// admin
// Route::group(['middleware' => ['auth', 'role:admin']], function () {
//     

// });


// / Rute untuk Karyawan
// Route::group(['middleware' => ['auth', 'role:karyawan']], function () {
   
// }); 
  
// });
Route::get('/login', [loginController::class, 'form'])->name('login');
Route::post('/login', [loginController::class, 'login'])->name('login');
Route::get('/logout', [loginController::class, 'logout'])->name('logout');


// Route::get('/template_karyawan', function () {
//     return view('template_karyawan');
// });
// Route::get('/login', function () {
//     return view('auth/login');
// // });
// Route::get('/template_admin', function () {
//     return view('template_admin');
// });
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
// Route::get('/karyawan', function () {
//     return view('karyawan.dashboard.index');
// });
// Route::get('/presensi_karyawan', function () {
//     return view('karyawan.presensi.index');
// });
// Route::get('/laporan_karyawan', function () {
//     return view('karyawan.laporan.index');
// });

// require __DIR__ . '/auth.php';

