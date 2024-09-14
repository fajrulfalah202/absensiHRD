<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanDataKaryawan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('karyawan.data_karyawan.index', );
    }
    public function getDummyDataKaryawan()
    {
        return [
            [
                'id' => 1,
                'nama' => 'totol',
                'nik' => '111',
                'jenis_kelamin' => 'laki laki',
                'tempat_lahir' => 'inggris',
                'tanggal_lahir' => '2024-08-01',
                'alamat' => 'inggris',
                'perusahaan' => 'perusahaan 3',
                'posisi' => 'team principal',
            ],
            [
                'id' => 2,
                'nama' => 'titi',
                'nik' => '111',
                'jenis_kelamin' => 'laki laki',
                'tempat_lahir' => 'inggris',
                'tanggal_lahir' => '2024-08-01',
                'alamat' => 'inggris',
                'perusahaan' => 'mercedez',
                'posisi' => 'team principal',
            ],
        ];
    }

    public function getDummyDataKaryawanJson()
    {
        $dummyData = $this->getDummyDataKaryawan();
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
            // Fetch the dummy data
        $dummyData = $this->getDummyDataKaryawan();

        // dd($dummyData, $id);

        // Find the specific data by ID
        $data = collect($dummyData)->firstWhere('id', (int)$id);
        if (is_array($data)) {
            $data = (object) $data;
        }
        // dd($data);

        if ($data) {
            //  dd($data);
            return view('karyawan.data_karyawan.edit', compact('data'));
        } else {
            return redirect()->back()->with('error', 'Data not found');
        }

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
