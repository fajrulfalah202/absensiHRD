<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class superAdminDataKaryawan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('super_admin.data_karyawan.index', );
    }
    public function getDummyDataKaryawan()
    {
        $dummyData = [
            [
             
                'nama' => 'toto',
                'nik' => '111',
                'jenis_kelamin' => 'laki laki',
                'tempat_lahir' => 'inggris',
                'tanggal_lahir' => '2024-08-01',
                'alamat' => 'inggris',
                'perusahaan' => 'mercedez',
                'posisi' => 'team principal',
            ],
        ];
        
        return response()->json(['data' => $dummyData]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
