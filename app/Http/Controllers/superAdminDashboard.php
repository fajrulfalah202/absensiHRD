<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
// use App\Models\User;
use App\Models\dataKaryawan;
use Illuminate\Http\Request;

class superAdminDashboard extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // Ambil pengguna yang sedang login
        $dataKaryawan = dataKaryawan::where('id_user', $user->id_user)->first(); // Ambil data karyawan terkait
        // dd($dataKaryawan->toArray());
        return view('super_admin.dashboard.index',compact('dataKaryawan') );
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
