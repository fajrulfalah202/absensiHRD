<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/template_karyawan', function () {
    return view('template_karyawan');
});
Route::get('/template_admin', function () {
    return view('template_admin');
});
Route::get('/hrd', function () {
    return view('hrd.dashboard.index');
});
Route::get('/karyawan', function () {
    return view('karyawan.dashboard.index');
});
Route::get('/presensi_karyawan', function () {
    return view('karyawan.presensi.index');
});
Route::get('/laporan_karyawan', function () {
    return view('karyawan.laporan.index');
});

