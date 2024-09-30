<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\dataKaryawan;
use App\Models\Presensi;
class AdminPresensi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // Ambil pengguna yang sedang login
        $dataKaryawan = DataKaryawan::where('id_user', $user->id_user)->first(); // Ambil data karyawan terkait
        
        

         // Cek apakah pengguna memiliki izin sakit untuk hari ini
        $today = now()->toDateString();
        $hasIzin  = Presensi::where('id_user', $user->id_user)
            ->where('tanggal', $today)
            ->whereIn('status', ['sakit', 'izin'])
            ->exists();
        $canPresensi = $hasIzin;

        // cek apa sudah absen masuk
        $cekMasuk  = Presensi::where('id_user', $user->id_user)
            ->where('tanggal', $today)
            ->whereIn('status', ['absen_masuk','hadir'])
            ->exists();
        $sudahMasuk = $cekMasuk;

        // cek keluar
        $cekkeluar  = Presensi::where('id_user', $user->id_user)
            ->where('tanggal', $today)
            ->where('status', 'hadir')
            ->exists();
        $sudahkeluar = $cekkeluar;
        // dd($sudahkeluar);
        // dd($sudahMasuk);
        $dataPresensi = Presensi::where('id_user', $user->id_user)
                                    ->where('tanggal',$today)
                                    ->first(); // Ambil data karyawan terkait
            return view('admin.presensi.index',compact('dataKaryawan','canPresensi','sudahMasuk','sudahkeluar','dataPresensi' ) );
    }
    public function presensiMasuk(Request $request)
    {
        
        $request->validate([
            'keterangan' => 'required|string',
        ]);

        // Simpan data presensi masuk
        Presensi::create([
            'id_user' => Auth::user()->id_user, // ID pengguna yang login
            'jenis' => 'masuk',
            'tanggal' => now()->toDateString(),
            'keterangan' => $request->input('keterangan'),
            'status' => "absen_masuk",
            'lokasi' => $request->input('lokasi'),
            'check_in' => now(),
            'check_out' => "belum_keluar",
        ]);
        
        return redirect()->back()->with('success', 'Presensi masuk berhasil buat admin!');
    }
    public function presensiKeluar(Request $request)
    {
        // Validasi input jika diperlukan
     

        $userId = Auth::user()->id_user; // ID pengguna yang login
        $today = now()->format('Y-m-d'); // Tanggal hari ini

        // Cek apakah ada record presensi masuk untuk hari ini
        $presensi = Presensi::where('id_user', $userId)
            ->where('tanggal', $today)
            ->first();

        if ($presensi) {
            // Jika ada record presensi masuk, update check_out
            $presensi->update([
                'check_out' => now(),
                'status' => "hadir",
            ]);

            return redirect()->back()->with('success', 'Presensi keluar berhasil!');
        } else {
            // Jika tidak ada record presensi masuk untuk hari ini
            return redirect()->back()->with('error', 'Tidak ada presensi masuk untuk hari ini.');
        }
    }

    public function izinAbsen(Request $request)
    {
        $request->validate([
            'status' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        // Simpan data izin absen
        Presensi::create([
            'id_user' => Auth::user()->id_user, // ID pengguna yang login
            'jenis' => 'izin',
            'tanggal' => now()->toDateString(),
            'check_in' => "-",
            'check_out' => "-",
            'status' => $request->input('status'),
            'lokasi' => "-",
            'keterangan' => $request->input('keterangan'),
            'waktu' => now(),
        ]);

        return redirect()->back()->with('success', 'Izin absen berhasil!');
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
