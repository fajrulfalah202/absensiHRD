<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/template_karyawan', function () {
    return view('template_karyawan');
});
