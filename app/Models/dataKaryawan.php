<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataKaryawan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'data_karyawan';
    protected $fillable = [
        'id',
        'id_user',
        'nama',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'perusahaan',
        'posisi',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // 'user_id' sesuai dengan nama kolom foreign key
    }
    public function jenisKelamin()
    {
        return $this->belongsTo(jenisKelamin::class, 'jenis_kelamin');
    }
        public function perusahaan()
    {
        return $this->belongsTo(perusahaan::class, 'perusahaan');
    }
    
}
