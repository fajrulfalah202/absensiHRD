<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\dataKaryawan;
use App\Models\User;
use App\Models\laporanKehadiran;

class AdminLaporanKehadiran extends Controller
{
    /**
     * Display a listing of the resource.
     */
      
    public function index()
    {
        $user = Auth::user(); // Ambil pengguna yang sedang login
        $dataKaryawan = dataKaryawan::where('id_user', $user->id_user)->first(); 
        return view('admin.laporan_kehadiran.index',compact('dataKaryawan') );
    }
    public function terlambat()
    {
        $user = Auth::user(); // Ambil pengguna yang sedang login
        $dataKaryawan = dataKaryawan::where('id_user', $user->id_user)->first();
        return view('admin.laporan_kehadiran.terlambat',compact('dataKaryawan'));
    }
    public function lembur()
    {
        $user = Auth::user(); // Ambil pengguna yang sedang login
        $dataKaryawan = dataKaryawan::where('id_user', $user->id_user)->first();    
        return view('admin.laporan_kehadiran.lembur', compact('dataKaryawan'));
    }

    public function getTerlambat()
    {
        $data = laporanKehadiran::all();
        $filteredData = $data->filter(function($item) {
            // Cek apakah check_in atau check_out tidak valid (misalnya tanda "-")
            if ($item->check_in == '-' || $item->check_out == '-' || $item->check_in == null || $item->check_out == null) {
                return false; // Abaikan data jika check_in atau check_out tidak valid
            }
    
            // Jika valid, parse menggunakan Carbon
            $checkIn = Carbon::parse($item->check_in);
            $checkOut = Carbon::parse($item->check_out);
            $difference = $checkIn->diffInHours($checkOut);
    
            return $difference < 8; // Kembalikan true jika selisih kurang dari 8 jam
        });
    
        // dd($filteredData->toArray());
        // Mengembalikan data yang sudah difilter dalam format JSON
        return response()->json(['data' => $filteredData->values()->all()]);
    }
    public function getLembur()
    {
        $data = laporanKehadiran::all();
        // Filter data yang memiliki selisih waktu kurang dari 8 jam
        $filteredData = $data->filter(function($item) {
            // Cek apakah check_in atau check_out tidak valid (misalnya tanda "-")
            if ($item->check_in == '-' || $item->check_out == '-' || $item->check_in == null || $item->check_out == null) {
                return false; // Abaikan data jika check_in atau check_out tidak valid
            }
    
            // Jika valid, parse menggunakan Carbon
            $checkIn = Carbon::parse($item->check_in);
            $checkOut = Carbon::parse($item->check_out);
            $difference = $checkIn->diffInHours($checkOut);
    
            return $difference > 8; // Kembalikan true jika selisih kurang dari 8 jam
        });
    
    
        // Mengembalikan data yang sudah difilter dalam format JSON
        return response()->json(['data' => $filteredData->values()->all()]);
    }
    public function getKehadiran()
    { 

        $data = laporanKehadiran::all();
        // return response()->json(['data' => $dummyData]);
        // dd($data);
        return response()->json(['data' => $data]);
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
