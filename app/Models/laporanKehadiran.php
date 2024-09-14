<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporanKehadiran extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'kehadiran';
    protected $fillable = [
        'id_kehadiran',
        'id_user',
        'check_in',
        'check_out',
        'lokasi',
        

    ];
    public function dataKaryawan()
    {
        return $this->belongsTo(dataKaryawan::class, 'id_user', 'id');
    }
}
