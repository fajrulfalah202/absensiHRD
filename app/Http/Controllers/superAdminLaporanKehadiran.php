<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class superAdminLaporanKehadiran extends Controller
{
    /**
     * Display a listing of the resource.
     */
        protected $dummyData;

     public function __construct()
    {
        $this->dummyData = [
            [
                'nama' => 'toto',
                'tanggal' => '2024-08-01',
                'check_in' => '08:00:00',
                'check_out' => '17:00:00',
                'lokasi' => 'kantor',
                'keterangan' => 'hadir',
            ],
            [
                'nama' => '-02',
                'tanggal' => '2024-08-02',
                'check_in' => '08:15:00',
                'check_out' => '16:00:00',
                'lokasi' => 'kantor',
                'keterangan' => 'hadir',
            ],
        ];
    }

    public function index()
    {
        return view('super_admin.laporan_kehadiran.index', );
    }
    public function terlambat()
    {
        return view('super_admin.laporan_kehadiran.terlambat', );
    }
    public function lembur()
    {
        return view('super_admin.laporan_kehadiran.lembur', );
    }

    public function getDummyTerlambat()
    {
        // Filter data yang memiliki selisih waktu kurang dari 8 jam
        $filteredData = array_filter($this->dummyData, function($data) {
            $checkIn = Carbon::createFromTimeString($data['check_in']);
            $checkOut = Carbon::createFromTimeString($data['check_out']);
            $difference = $checkIn->diffInHours($checkOut);

            return $difference < 8;
        });
        
        return response()->json(['data' => array_values($filteredData)]);
    }
    public function getDummyLembur()
    {
        // Filter data yang memiliki selisih waktu kurang dari 8 jam
        $filteredData = array_filter($this->dummyData, function($data) {
            $checkIn = Carbon::createFromTimeString($data['check_in']);
            $checkOut = Carbon::createFromTimeString($data['check_out']);
            $difference = $checkIn->diffInHours($checkOut);

            return $difference > 8;
        });
        
        return response()->json(['data' => array_values($filteredData)]);
    }
    public function getDummyKehadiran()
    { 

        return response()->json(['data' => $this->dummyData]);
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
