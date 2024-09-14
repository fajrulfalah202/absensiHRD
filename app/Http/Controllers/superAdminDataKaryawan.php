<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\dataKaryawan;
use App\Models\User;
use App\Models\jenisKelamin;
use App\Models\perusahaan;
class superAdminDataKaryawan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $dataUser = User::all();
        $data = dataKaryawan::all();
        $user = Auth::user(); // Ambil pengguna yang sedang login
        $dataKaryawan = dataKaryawan::where('id_user', $user->id_user)->first();        

        return view('super_admin.data_karyawan.index',  compact('data', 'dataUser','dataKaryawan'));
    }
    

    public function getData()
    {
        $data = DataKaryawan::with(['jenisKelamin', 'perusahaan'])->get();

        return response()->json([
            'data' => $data
        ]);
        
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

        // dd($request->all());
         // Validasi input
        $request->validate([
            
            'id_user',
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
           
            'jenis_kelamin',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'perusahaan' => 'required|integer',
            'posisi' => 'required|string',
        ]);
        // dd($request);
        // Menyimpan data ke database
        $dataKaryawan = new dataKaryawan();
        $dataKaryawan->nama = $request->input('nama');
        $dataKaryawan->id_user = $request->input('id_user');
        $dataKaryawan->nik = $request->input('nik');
        $dataKaryawan->jenis_kelamin = $request->input('jenis_kelamin');
        $dataKaryawan->tempat_lahir = $request->input('tempat_lahir');
        $dataKaryawan->tanggal_lahir = $request->input('tanggal_lahir');
        $dataKaryawan->alamat = $request->input('alamat');
        $dataKaryawan->perusahaan = $request->input('perusahaan');
        $dataKaryawan->posisi = $request->input('posisi');
        $dataKaryawan->save();

        // Redirect dengan pesan sukses
        return redirect()->route('SA.Data_karyawan.index')
                        ->with('success', 'Data karyawan berhasil ditambahkan.');

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
        $data = dataKaryawan::find($id);
        $dataid = dataKaryawan::all();
        $user = Auth::user(); // Ambil pengguna yang sedang login
        $dataKaryawan = dataKaryawan::where('id_user', $user->id_user)->first();

        
      
        // dd($data->toArray());

        if ($data) {
            //  dd($data);
            return view('super_admin.data_karyawan.edit', compact('data', 'dataid','dataKaryawan'));
        } else {
            return redirect()->back()->with('error', 'Data not found');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            // Validasi input
    $request->validate([
        'id_user' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
        'nik' => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:1,2', // Menyesuaikan dengan nilai yang diizinkan
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required|string',
        'perusahaan' => 'required|integer',
        'posisi' => 'required|string',
    ]);

    // Mendapatkan data karyawan berdasarkan ID
    $dataKaryawan = dataKaryawan::findOrFail($id); // Pastikan 'Karyawan' adalah nama model Anda

    // Mengupdate data
    $dataKaryawan->nama = $request->input('nama');
    $dataKaryawan->id_user = $request->input('id_user');
    $dataKaryawan->nik = $request->input('nik');
    $dataKaryawan->jenis_kelamin = $request->input('jenis_kelamin');
    $dataKaryawan->tempat_lahir = $request->input('tempat_lahir');
    $dataKaryawan->tanggal_lahir = $request->input('tanggal_lahir');
    $dataKaryawan->alamat = $request->input('alamat');
    $dataKaryawan->perusahaan = $request->input('perusahaan');
    $dataKaryawan->posisi = $request->input('posisi');
    $dataKaryawan->save();

    // Redirect dengan pesan sukses
    return redirect()->route('SA.Data_karyawan.index')
                     ->with('success', 'Data karyawan berhasil diperbarui.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = dataKaryawan::find($id);
        // $data->delete();
        if ($data) {
            // Hapus data
            $data->delete();
            
            // Redirect dengan pesan sukses
            return redirect()->route('SA.Data_karyawan.index')
                             ->with('success', 'Data berhasil dihapus.');
        }
    
        // Redirect dengan pesan error jika data tidak ditemukan
        return redirect()->route('SA.Data_karyawan.index')
                         ->with('error', 'Data tidak ditemukan.');
                        
    }
}
