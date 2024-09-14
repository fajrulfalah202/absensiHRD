<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenisKelamin extends Model
{
    use HasFactory;
    protected $table = 'jenis_kelamin'; // Nama tabel
    // public $timestamps = false;
    protected $fillable = ['id', 'nama_kelamin'];
    public function dataKaryawan()
{
    return $this->hasMany(DataKaryawan::class, 'jenis_kelamin');
}
}
