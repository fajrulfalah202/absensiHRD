<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\laporanKehadiran;
use Illuminate\Support\Facades\Auth;
use App\Models\dataKaryawan;
use App\Models\User;



class superAdminLaporanKehadiran extends Controller
{
    
    public function index()
    {
        $user = Auth::user(); // Ambil pengguna yang sedang login
        $dataKaryawan = dataKaryawan::where('id_user', $user->id_user)->first();
        return view('super_admin.laporan_kehadiran.index',compact('dataKaryawan'));
    }
    public function terlambat()
    {
        $user = Auth::user(); // Ambil pengguna yang sedang login
        $dataKaryawan = dataKaryawan::where('id_user', $user->id_user)->first();
        return view('super_admin.laporan_kehadiran.terlambat',compact('dataKaryawan'));
    }
    public function lembur()
    {
        $user = Auth::user(); // Ambil pengguna yang sedang login
        $dataKaryawan = dataKaryawan::where('id_user', $user->id_user)->first();
        return view('super_admin.laporan_kehadiran.lembur',compact('dataKaryawan') );
    }

    public function getDummyTerlambat()
    {
            // Mengambil semua data kehadiran
        $data = laporanKehadiran::all();
        
        // Menggunakan Collection untuk memfilter data
        $filteredData = $data->filter(function($item) {
            $checkIn = Carbon::parse($item->check_in);
            $checkOut = Carbon::parse($item->check_out);
            $difference = $checkIn->diffInHours($checkOut);

            return $difference < 8;
        });

        // Mengembalikan data yang sudah difilter dalam format JSON
        return response()->json(['data' => $filteredData->values()->all()]);
    }
    public function getDummyLembur()
    {
       // Mengambil semua data kehadiran
    $data = laporanKehadiran::all();

    // Menggunakan Collection untuk memfilter data
    $filteredData = $data->filter(function($item) {
        $checkIn = Carbon::parse($item->check_in);
        $checkOut = Carbon::parse($item->check_out);
        $difference = $checkIn->diffInHours($checkOut);

        return $difference > 8;
    });

    // Mengembalikan data yang sudah difilter dalam format JSON
    return response()->json(['data' => $filteredData->values()->all()]);
    }
    public function getData()
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
         // Fetch the dummy data
         $data = laporanKehadiran::find($id);
         $user = Auth::user();
         $dataid = dataKaryawan::all();
         $dataKaryawan = dataKaryawan::where('id_user', $user->id_user)->first();        
      
        //  dd($dataKaryawan->toArray());
 
         if ($data) {
             //  dd($data);
             return view('super_admin.laporan_kehadiran.edit', compact('data','dataKaryawan','dataid'));
         } else {
             return redirect()->back()->with('error', 'Data not found');
         }
 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'id_user' => 'required|string|max:255',
        //     'tanggal' => 'required|string|max:255',
        //     'check_in' => 'required',
        //     'check_out' => 'required',
        //     'status' => 'required',
        //     'lokasi' => 'required',
        //     'keterangan' => 'required',
            
        // ]);
        $laporanKehadiran = laporanKehadiran::findOrFail($id); // Pastikan 'Karyawan' adalah nama model Anda
        // dd($laporanKehadiran->toArray());

        // Mengupdate data
        $laporanKehadiran->id_user = $request->input('id_user');
        $laporanKehadiran->tanggal = $request->input('tanggal');
        $laporanKehadiran->check_in = $request->input('check_in');
        $laporanKehadiran->check_out = $request->input('check_out');
        $laporanKehadiran->status = $request->input('status');
        $laporanKehadiran->lokasi = $request->input('lokasi');
        $laporanKehadiran->keterangan = $request->input('keterangan');
        $laporanKehadiran->save();

        // Redirect dengan pesan sukses
        return redirect()->route('SA.lapor.index')
                        ->with('success', 'Data karyawan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = laporanKehadiran::find($id);
        // $data->delete();
        if ($data) {
            // Hapus data
            $data->delete();
            
            // Redirect dengan pesan sukses
            return redirect()->route('SA.lapor.index')
                             ->with('success', 'Data berhasil dihapus.');
        }
    
        // Redirect dengan pesan error jika data tidak ditemukan
        return redirect()->route('SA.lapor.index')
                         ->with('error', 'Data tidak ditemukan.');
                        
    }
}
