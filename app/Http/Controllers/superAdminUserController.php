<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\dataKaryawan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class superAdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // Ambil pengguna yang sedang login
        $dataKaryawan = dataKaryawan::where('id_user', $user->id_user)->first(); 

        return view('super_admin.data_user.index',compact('dataKaryawan'));

    }
    public function getData()
    {
        $data = User::all();
        // dd('dapay data');
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
          // Validasi input
        //   $request->validate([
            
        //     'id_user',
        //     'nama' => 'required|string|max:255',
        //     'nik' => 'required|string|max:255',
           
        //     'jenis_kelamin',
        //     'tempat_lahir' => 'required|string|max:255',
        //     'tanggal_lahir' => 'required|date',
        //     'alamat' => 'required|string',
        //     'perusahaan' => 'required|integer',
        //     'posisi' => 'required|string',
        // ]);
        // dd($request);
        // Menyimpan data ke database
        $User = new User();
        $User->id_user = $request->input('id_user');
        $User->username = $request->input('username');
        $User->password = Hash::make($request->input('password'));;
        $User->role = $request->input('role');
        $User->save();

        // Redirect dengan pesan sukses
        return redirect()->route('SA.Data_User.index')
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
        $data = User::find($id);
        $user = Auth::user();
        $dataKaryawan = dataKaryawan::where('id_user', $user->id_user)->first();  
        
      
        // dd($data);

        if ($data) {
            //  dd($data);
            return view('super_admin.data_user.edit', compact('data','dataKaryawan'));
        } else {
            return redirect()->back()->with('error', 'Data not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // Validasi input (tambahkan validasi sesuai kebutuhan)
        $request->validate([
            'id_user' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:6', // Password tidak wajib di-update
            'role' => 'required|string|max:255',
        ]);
    
        $user->id_user = $request->input('id_user');
        $user->username = $request->input('username');
        
        // Hash password hanya jika ada perubahan password
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password')); // Hash password
        }
        
        $user->role = $request->input('role');
        $user->save();
    
        // Redirect dengan pesan sukses
        return redirect()->route('SA.Data_User.index')
                         ->with('success', 'Data karyawan berhasil diedit.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::find($id);
        // $data->delete();
       
        if ($data) {
            // Hapus data
            $data->delete();
            
            // Redirect dengan pesan sukses
            return redirect()->route('SA.Data_User.index')
                             ->with('success', 'Data berhasil dihapus.');
        }
    
        // Redirect dengan pesan error jika data tidak ditemukan
        return redirect()->route('SA.Data_User.index')
                         ->with('error', 'Data tidak ditemukan.');
                        
    }
}
